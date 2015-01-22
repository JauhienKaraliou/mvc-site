<?php
/**
 * Created by PhpStorm.
 * User: jauhien
 * Date: 16.1.15
 * Time: 11.15
 */

class GuestbookModel extends Model {

    public static function getMessages()
    {
        $sth = DB::getInstance() -> prepare('SELECT * FROM `st1_comments`');
        $sth -> execute();
        $list = $sth -> fetchAll();
        return $list;
    }

    public static function countMessages()
    {
        $sth = DB::getInstance() -> prepare('SELECT COUNT(*) AS num FROM `st1_comments`');
        $sth -> execute();
        $quantity = $sth -> fetch();
        return $quantity['num'];
    }

    public function goToPage($num)
    {

    }

}