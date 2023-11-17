<?php

namespace dao;

use Connector;
use model\DepartmentEntity;
use model\StaffEntity;

require_once __DIR__."/../entities/DepartmentEntity.php";
class Department
{

    public static function getAllDepartments(): array
    {
        $connDb = Connector::connect();
        $SELECT_ALL = "SELECT * FROM phongban";
        $res = mysqli_fetch_all(mysqli_query($connDb, $SELECT_ALL), MYSQLI_ASSOC);
        $listStd = array();
        foreach ($res as $each) {
            $std = new DepartmentEntity($each['IDPB'], $each['Tenpb'], $each['Mota']);
            $listStd[] = $std;
        }
        return $listStd;
    }
    public static function getDepartmentById(int $id): DepartmentEntity
    {
        $connDb = Connector::connect();
        $SELECT_BY_ID = "SELECT * FROM phongban where IDPB = $id";
        $res = mysqli_fetch_assoc(mysqli_query($connDb, $SELECT_BY_ID));
        return new DepartmentEntity($res['IDPB'], $res['Tenpb'], $res['Mota']);
    }
}