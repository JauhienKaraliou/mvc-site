<?php
/**
 * Created by PhpStorm.
 * User: jauhien
 * Date: 14.1.15
 * Time: 15.09
 */

class Wake {

    public function __construct()
    {
        $url = (isset($_GET['url']))?trim($_GET['url']):DEFAULT_CONTROLLER;
        $urlParam = explode('/',$url);
        $controllerName = $urlParam[0].'Controller';
        $controllerPath =__DIR__.'/controllers/'.strtolower($urlParam[0]).'Controller.php';

        require $controllerPath;
        $controller = new $controllerName;
        $actionName = (isset($urlParam[1]))?$urlParam[1]:DEFAULT_ACTION;
        $actionName.='Action';
        echo $controller -> $actionName();
        echo '<br>test<br>';
        echo __DIR__;
    }


}