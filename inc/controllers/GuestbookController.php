<?php
/**
 * Created by PhpStorm.
 * User: jauhien
 * Date: 16.1.15
 * Time: 11.13
 */

class GuestbookController extends Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function defaultAction()
    {
        require 'inc/models/GuestbookModel.php';
        $this -> view -> messages = GuestbookModel::getMessages();
        $this -> view -> render('guestbook');

    }

}