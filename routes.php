<?php

use controller\DepartmentController;
use controller\LoginLogoutAdminController;
use controller\StaffController;
include_once "./Environment_Config.php";

class RoutesConfig {
    public static function getRoutesConfig(): array
    {
        return [
            Environment_Config::$rootFolder.'/staffs' => [
                'GET'=> StaffController::getStaffsCallBack()
                ],
            Environment_Config::$rootFolder.'/add-staff' => [
                'GET' => StaffController::getAddStaffPageCallBack(),
                'POST' => StaffController::addNewStaffCallBack()
            ],
            Environment_Config::$rootFolder.'/update-staff' => [
                'GET' => StaffController::getUpdateStaffPageCallBack(),
                'POST' => StaffController::updateStudentCallBack()
            ],
            Environment_Config::$rootFolder.'/delete-staffs' => [
                'POST' => StaffController::deleteStaffsCallBack()
            ],
            Environment_Config::$rootFolder.'/search-staffs' => [
                'GET' => StaffController::getSearchStaffPageCallBack()
            ],
            Environment_Config::$rootFolder.'/all-departments' => [
                'GET' => DepartmentController::getAllDepartmentsCallBack()
            ],
            Environment_Config::$rootFolder.'/login' => [
                'GET' => LoginLogoutAdminController::getLoginPageCallBack(),
                'POST' => LoginLogoutAdminController::loginCallBack()
            ],
            Environment_Config::$rootFolder.'/logout' => [
                'POST' => LoginLogoutAdminController::logoutCallBack()
            ]

        ];
    }
}
