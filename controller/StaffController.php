<?php

namespace controller;

use dao\Department;
use dao\Staff;
use Environment_Config;
use model\SearchStaffDto;
use model\StaffEntity;
require_once __DIR__."/LoginLogoutAdminController.php";
require_once __DIR__."/../dao/Staff.php";
require_once __DIR__."/../common/connectDB.php";
require_once __DIR__."/../entities/SearchStaffDto.php";
require_once __DIR__."/../dao/Department.php";

class StaffController extends LoginLogoutAdminController
{
    protected static function getStaffs(): void
    {
        if(isset($_GET['attribute']) && isset($_GET['search-key'])){
            $attribute = $_GET['attribute'];
            $keyword = $_GET['search-key'];
            $searchDto = new SearchStaffDto($attribute, $keyword);
            $_SESSION['staffs'] = Staff::searchStaff($searchDto);
        }
        else $_SESSION['staffs'] = Staff::getAllStaffs();
        require_once __DIR__ . "/../view/StaffsPage.php";
    }
    protected static function addNewStaff(): void
    {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $deptId = $_POST['dept-id'];
        $staff = new StaffEntity((int)null, $name,$address,$deptId);
        Staff::insertStaff($staff);
        header("Location: ". Environment_Config::$rootFolder."/staffs");
    }
    protected static function getAddStaffPage(): void
    {
        $_SESSION['all-departments'] = Department::getAllDepartments();
        require_once  __DIR__."/../view/AddNewStaffPage.php";
    }
    protected static function getUpdateStaffPage(): void
    {
        $id=$_GET['id'];
        $_SESSION['staff'] = Staff::getStaffById($id);
        $_SESSION['all-departments'] = Department::getAllDepartments();
        require_once  __DIR__."/../view/UpdateStaffPage.php";
    }
    protected static function updateStudent(): void
    {
        $id=$_POST['id'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $deptId = $_POST['dept-id'];
        $staff = new StaffEntity((int)null, $name,$address,$deptId);
        Staff::updateStaff($id, $staff);
        header("Location: ". Environment_Config::$rootFolder."/staffs");
    }
    protected static function deleteStaffs(): void
    {
        var_dump($_POST);
        $ids= explode(", ", $_POST['ids']);
        Staff::deleteStaffs($ids);
        header("Location: ". Environment_Config::$rootFolder."/staffs");
    }
    protected static function getSearchStaffPage(): void
    {
        require_once  __DIR__."/../view/SearchStaffPage.php";
    }
    public static function getStaffsCallBack(): string
    {
        return 'self::getStaffs';
    }

    public static function addNewStaffCallBack(): string
    {
        return 'self::addNewStaff';
    }
    public static function getAddStaffPageCallBack(): string
    {
        return 'self::getAddStaffPage';
    }
    public static function updateStudentCallBack(): string
    {
        return 'self::updateStudent';
    }

    public static function deleteStaffsCallBack(): string
    {
        return 'self::deleteStaffs';
    }
    public static function getUpdateStaffPageCallBack(): string
    {
        return 'self::getUpdateStaffPage';
    }
    public static function getSearchStaffPageCallBack(): string
    {
        return 'self::getSearchStaffPage';
    }

}