<?php

namespace dao;

use Connector;
use exception\UserNotExistException;
use model\AdminEntity;
require_once __DIR__."/../entities/DepartmentEntity.php";
require_once __DIR__."/../entities/AdminEntity.php";
require_once __DIR__."/../dao/Admin.php";
class Admin
{
    /**
     * @throws UserNotExistException when there are no user found
     */
    public static function getAdminByName(string $username): AdminEntity
    {
        $connDb = Connector::connect();
        $SELECT_BY_USERNAME = "SELECT * FROM admin where Username = '$username'";
        $res = mysqli_fetch_assoc(mysqli_query($connDb, $SELECT_BY_USERNAME));
        if ($res == null) throw new UserNotExistException("$username not exist");
        return new AdminEntity($res['ID'], $res['Username'], $res['Password']);
    }
}