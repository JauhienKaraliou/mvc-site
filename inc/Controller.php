<?php
/**
 * Created by PhpStorm.
 * User: jauhien
 * Date: 14.1.15
 * Time: 15.33
 */

class Controller {
    protected $view;

    protected function __construct($name)
    {
        $this->view = new View($name);
    }

    public function defaultAction()
    {

        return __METHOD__;
    }

}