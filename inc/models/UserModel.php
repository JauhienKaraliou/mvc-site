<?php


class UserModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public static function getAllUsers()
    {
        $users = array('1' => 'user1', '2' => 'user2', '3' => 'user3');
        return $users;
    }

    public static function processRegForm()
    {
        $resultMessage = '';
        $formValid = true;
        $name = htmlspecialchars($_POST['name']);
        if(self::checkIfUsernameUnique($name)) {
            $resultMessage .= 'Username is not unique';
            $formValid = false;
            $name = '';
        }
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        if (!$email OR self::checkIfEmailUnique($email)) {
            $resultMessage .= '<br>Invalid e-mail';
            $email='';
            $formValid = false;
        }
        if (htmlspecialchars($_POST['password']) !== htmlspecialchars($_POST['passwordrepeat'])) {
            $resultMessage .= '<br>Invalid password';
            $formValid = false;
        }
       /* if (htmlspecialchars($_POST['captcha']) != $_SESSION['captchaQuestion']) {
            $resultMessage .= '<br>Invalid captcha';
            $formValid = false;
        }*/
        $formDataArray = array(
            'name' => $name,
            'email' => $email,
            'sha1_pswd' => sha1($_POST['password']),
            'act_code' => sha1(rand(0, getrandmax()) . $email),
            'comment' => htmlspecialchars($_POST['about']),
            'user_status' => '3',
            'reg_time' => time(),
            'form_valid' => $formValid,
            'result_msg' => $resultMessage
        );
        return $formDataArray;

    }

    public static function registerUser($formDataArray)
    {
        $letterContent = file_get_contents('inc/utils/letterRegistration.php');
        $letterContent = str_replace('{{LINK}}',parent::generateLink(array('users','activate',
            $formDataArray['act_code'])), $letterContent);
            return (self::addUser($formDataArray) AND
                parent::sendMail($formDataArray['email'], 'registration', $letterContent));
    }

    public static function checkIfEmailUnique($email)
    {
        $sth = DB::getInstance()->prepare('SELECT `user_id` FROM `st1_users` WHERE `email`=:email');
        $sth->execute(array('email' => $email));
        $res = $sth->fetch();
        return $res;
    }

    public static function addUser($formDataArray)
    {
        $sth = DB::getInstance()->prepare('INSERT INTO  `st1_users`(`name`, `sha1_pswd`, `act_code`, `user_status`,
            `reg_time`,`comment`,`email`) VALUES (:name, :sha1_pswd, :act_code, :user_status, :reg_time, :comment,
            :email) ');
        return $sth->execute(array(
            'name'=>$formDataArray['name'],
            'sha1_pswd'=>$formDataArray['sha1_pswd'],
            'act_code'=>$formDataArray['act_code'],
            'user_status'=>$formDataArray['user_status'],
            'reg_time'=>$formDataArray['reg_time'],
            'comment'=>$formDataArray['comment'],
            'email'=>$formDataArray['email']));
    }

    public static function checkIfUsernameUnique($username)
    {
        $sth = DB::getInstance() -> prepare('SELECT `user_id` FROM `st1_users` WHERE `name`=:name');
        $sth->execute(array('name' => $username));
        $res = $sth -> fetch();
        return $res;
    }

    public static function activateUser($code)
    {
        $sth = DB::getInstance()->prepare('SELECT `user_id`,`user_status` FROM `st1_users` WHERE `act_code`=:act_code');
        $sth -> execute(array('act_code' => $code));
        $userParam = $sth->fetch();
        if($userParam['user_status'] == '3') {
            $sth = DB::getInstance()->prepare('UPDATE `st1_users` SET `user_status`=:user_status
                                               WHERE `user_id`=:user_id');
            return $sth -> execute(array('user_status' => '2', 'user_id'=> $userParam['user_id']));
        } elseif ($userParam['user_status'] == '2') {
            return 'Already activated!';
        } else {
            return 'something wrong! Maybe you should register!';
        }
    }

    public static function checkUserPassword($username,$password)
    {
        $sth = DB::getInstance()->prepare('SELECT `user_id`,`user_status` FROM `st1_users` WHERE `name`=:name and
            `sha1_pswd`=:sha1_pswd');
        $sth -> execute(array('name' => $username, 'sha1_pswd'=> sha1($password)));
        $userParam = $sth->fetch();
        if(($userParam['user_status'] == 2 or $userParam['user_status']== 1) and isset($userParam['user_id'])) {
            return true;
        } else {
            return false;
        }
    }
}