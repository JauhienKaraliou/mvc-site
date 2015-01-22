<?php

/**
 * Created by PhpStorm.
 * User: jauhien
 * Date: 19.1.15
 * Time: 11.10
 */
class RegistrationController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function defaultAction()
    {
        require_once 'inc/models/RegistrationModel.php';
        if (isset($_POST['register'])) {
            RegistrationModel::processRegForm();
        }

        require_once 'inc/utils/Captcha.php';
        //$this->view->captcha = Captcha::getPicture();
        //$this -> previosValues = RegistrationModel::getPreviousValues();
        $this->view->render('registration');

    }


}