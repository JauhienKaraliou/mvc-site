<?php
/**
 * Created by PhpStorm.
 * User: jauhien
 * Date: 16.1.15
 * Time: 9.12
 */

class UsersController extends Controller {

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

}