<?php
/**
 * Created by PhpStorm.
 * User: jauhien
 * Date: 15.1.15
 * Time: 13.31
 */

class Model {
    public function __construct()
    {

    }

    /**
     * name of a table on input of a method
     * @param $item
     * @return string
     */
    public static function countItems($item)
    {
        $sth = DB::getInstance() -> prepare('SELECT COUNT(*) AS num FROM `st1_comments`');
        $sth -> execute(array('item' => $item));
        $quantity = $sth -> fetch();
        return $quantity['num'];
    }

}