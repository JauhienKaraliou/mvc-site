<?php
/**
 * Created by PhpStorm.
 * User: jauhien
 * Date: 14.1.15
 * Time: 11.35
 */

class MainController extends Controller  {

    public function __construct()
    {
        parent::__construct('main');
    }

    public function shineAction()
    {
        echo '<br>shine!';
    }

}