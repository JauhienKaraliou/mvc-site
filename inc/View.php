<?php
/**
 * Created by PhpStorm.
 * User: jauhien
 * Date: 14.1.15
 * Time: 16.19
 */

class View {

    public function __construct()
    {

    }

    public function render($tplName)
    {
        include 'inc/views/'.$tplName.'.php';
    }

}