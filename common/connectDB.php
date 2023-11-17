<?php
require_once __DIR__."/../dbConfig.php";
class Connector
{
    public static function connect()
    {
        $db_config = DBConfig::getDBConfig();
        try {
            $connect_db = mysqli_connect($db_config['server_name'], $db_config['user_name'], $db_config['password'], $db_config['db_name']);
            mysqli_set_charset($connect_db, 'utf8');
            return $connect_db;
        } catch (PDOException $error) {
            die($error->getMessage());
        }
    }
}
