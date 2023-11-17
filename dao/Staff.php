<?php

namespace dao;

use Connector;
use model\SearchStaffDto;
use model\StaffEntity;
require_once __DIR__."/../entities/StaffEntity.php";
class Staff
{
    public static function getAllStaffs(): array
    {
        $connDb = Connector::connect();
        $SELECT_ALL = "SELECT * FROM nhanvien";
        $res = mysqli_fetch_all(mysqli_query($connDb, $SELECT_ALL), MYSQLI_ASSOC);
        $listStd = array();
        foreach ($res as $each) {
            $std = new StaffEntity($each['IDNV'], $each['Hoten'], $each['Diachi'], $each['IDPB']);
            $std->department = Department::getDepartmentById($std->deptId);
            $listStd[] = $std;
        }
        return $listStd;
    }
    public static function getStaffById(int $id): StaffEntity
    {
        $connDb = Connector::connect();
        $SELECT_BY_ID = "SELECT * FROM nhanvien where IDNV = $id";
        $res = mysqli_fetch_assoc(mysqli_query($connDb, $SELECT_BY_ID));
        return new StaffEntity($res['IDNV'], $res['Hoten'], $res['Diachi'], $res['IDPB']);
    }
    public static function insertStaff(StaffEntity $std): void
    {
        $connDb = Connector::connect();
        $INSERT_ONE = "INSERT INTO nhanvien(Hoten,IDPB,Diachi) values ('"
            .$std->name."',"
            .$std->deptId.",'"
            .$std->address."')";
        mysqli_query($connDb, $INSERT_ONE);
    }
    public static function updateStaff(int $id, StaffEntity $std): void
    {
        $connDb = Connector::connect();
        $UPDATE_BY_ID = "UPDATE nhanvien set Hoten = '".$std->name. "', "
            ."IDPB = ".$std->deptId.", "
            ."Diachi = '".$std->address
            ."' where IDNV = $id";
        mysqli_query($connDb, $UPDATE_BY_ID);
    }
    public static function deleteStaff(int $id): void
    {
        $connDb = Connector::connect();
        $DELETE_BY_ID = "DELETE FROM nhanvien where IDNV = $id";
        mysqli_query($connDb, $DELETE_BY_ID);
    }
    public static function deleteStaffs(array $ids): void
    {
        $connDb = Connector::connect();
        $DELETE = "DELETE FROM nhanvien where IDNV IN (".implode(', ',$ids).")";
        var_dump($DELETE);
        mysqli_query($connDb, $DELETE);
    }

    public static function searchStaff(SearchStaffDto $searchDto): array
    {
        $connDb = Connector::connect();
        $SEARCH = "select * from nhanvien where ";
        switch ($searchDto->getAttribute()){
            case "id":
                $SEARCH.=("id = ".$searchDto->getKeyword());
                break;
            case "name":
                $SEARCH.=("Hoten like '%".$searchDto->getKeyword()."%'");
                break;
            case "deptId":
                $SEARCH.=("IDPB = ".$searchDto->getKeyword());
                break;
            case "address":
                $SEARCH.=("Diachi like '%".$searchDto->getKeyword()."%'");
                break;
        }
        $res = mysqli_fetch_all(mysqli_query($connDb, $SEARCH), MYSQLI_ASSOC);
        $listStd = array();
        foreach ($res as $each) {
            $std = new StaffEntity($each['IDNV'], $each['Hoten'], $each['Diachi'], $each['IDPB']);
            $std->department = Department::getDepartmentById($std->deptId);
            $listStd[] = $std;
        }
        return $listStd;

    }

}