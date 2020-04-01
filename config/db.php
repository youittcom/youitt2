<?php
class Database{

    public static function connect(){
        $db = new mysqli('localhost','root','UZJIvESy5x','youitt2');
        $db->query("SET NAMES 'utf8");
        return $db;
    }
}
