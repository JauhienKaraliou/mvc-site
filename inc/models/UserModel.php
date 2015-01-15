<?php
/**
 * Created by PhpStorm.
 * User: jauhien
 * Date: 15.1.15
 * Time: 13.31
 */

class UserModel extends Model {

    public function __construct()
    {
        parent::__construct();
    }

    public static function getAllUsers()
    {
        $users = array('1'=>'user1','2'=> 'user2', '3'=>'user3');
        return $users;
    }

}