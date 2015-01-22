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
        $a = parent::countItems('st1_comments');
        return $a;
    }

}