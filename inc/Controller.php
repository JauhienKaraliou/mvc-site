<?php
/**
 * Created by PhpStorm.
 * User: jauhien
 * Date: 14.1.15
 * Time: 15.33
 */

class Controller {
    protected $view;

    protected function __construct()
    {
        $this->view = new View();
    }

    public function defaultAction()
    {

        return __METHOD__;
    }

}