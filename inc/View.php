<?php
/**
 * Created by PhpStorm.
 * User: jauhien
 * Date: 14.1.15
 * Time: 16.19
 */

class View {

    protected $tplContent;

    public function __construct($tplName)
    {
        $this->tplContent = file_get_contents('inc/views/'.$tplName.'.php');
    }

    public function render(array $params = array())
    {
        foreach($params as $k => $a) {
            $this->tplContent = str_replace('{{'.$k.'}}', $a, $this->tplContent);
        }
        echo $this->tplContent;
    }

}