<?php


class View {

    public function __construct()
    {

    }

    public function render($tplName)
    {
        include 'inc/views/'.$tplName.'.php';
    }


}