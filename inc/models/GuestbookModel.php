<?php
/**
 * Created by PhpStorm.
 * User: jauhien
 * Date: 16.1.15
 * Time: 11.15
 */

class GuestbookModel {

    public static function getMessages()
    {
        $sth = DB::getInstance() -> prepare('SELECT * FROM `mvc-messages`');
        $sth -> execute();
        $list = $sth -> fetchAll();
        return $list;
    }

}