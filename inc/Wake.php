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

        if(file_exists($controllerPath)) {
            require $controllerPath;
        } else {
            throw new Exception ('Controller not found');
        }

        $controller = new $controllerName;

        $actionName = (isset($urlParam[1]))?$urlParam[1]:DEFAULT_ACTION;
        $actionName.='Action';

        if(method_exists($controllerName, $actionName)) {
            echo $controller -> $actionName();
        } else {
            throw new Exception ('Method not exists');
        }

    }


}