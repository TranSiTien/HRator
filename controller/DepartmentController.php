<?php

namespace controller;

use dao\Department;

require_once __DIR__."/../dao/Department.php";
require_once __DIR__."/../common/connectDB.php";
class DepartmentController
{
    protected static function getAllDepartments(): void
    {
        $_SESSION['all-departments'] = Department::getAllDepartments();
        require_once __DIR__ . "/../view/AllDepartmentPage.php";
    }
    public static function getAllDepartmentsCallBack(): string
    {
        return 'self::getAllDepartments';
    }
}