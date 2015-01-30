<?php


class UsersController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function defaultAction()
    {
        include 'inc/models/UserModel.php';
        $this->view->users = UserModel::getAllUsers();
        $this->view->render('users');

    }

    public function registrationAction()
    {
        require_once 'inc/models/UserModel.php';
        require_once 'inc/utils/Captcha.php';
        if (isset($_POST['register'])) {
            $formDataArray = UserModel::processRegForm();
            if ($formDataArray['form_valid']) {
                if(UserModel::registerUser($formDataArray)) {
                    $_SESSION['resultMsg'] = 'registered successfully';
                    parent::redirect(array(''));
                } else {
                    $_SESSION['resultMsg'] = 'an error occurred';
                }
            } else {
                $_SESSION['resultMsg'] = $formDataArray['result_msg'];
                $_SESSION['about'] = $formDataArray['comment'];
                $_SESSION['name'] = $formDataArray['name'];
                $_SESSION['email'] = $formDataArray['email'];
            }
        }


        $this->view->captcha = Captcha::getQuestion();
        $this->view->render('registration');
        $_SESSION['resultMsg'] = '';
        $_SESSION['about'] = '';
        $_SESSION['name'] = '';
        $_SESSION['email'] = '';
    }

    public static function activateAction($actionParam)
    {
        require_once 'inc/models/UserModel.php';
        $_SESSION['resultMsg'] = UserModel::activateUser($actionParam);
        parent::redirect(array());
    }

    public static function loginAction()
    {
        require_once 'inc/models/UserModel.php';
        if(UserModel::checkUserPassword($_POST['username'], $_POST['password'])) {
            $_SESSION['username'] = htmlspecialchars($_POST['username']);
            if(isset($_POST['stay_logged'])) {
                setcookie(session_name(),session_id(),time()+3600*24);
            }
        } else {
            $_SESSION['resultMsg'] = 'User-Password does not match!';
        }
        header('Location:'.$_SERVER['HTTP_REFERER']);
    }

    public static function logoutAction()
    {
        unset ($_SESSION['username']);
        setcookie(session_name(), session_id(),time()-3600*24);
        parent::redirect(array());
    }



}