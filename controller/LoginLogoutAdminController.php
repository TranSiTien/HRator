<?php

namespace controller;

use dao\Admin;
use Environment_Config;
use exception\UserNotExistException;
use exception\WrongPasswordException;
use ROLE;
use User;
require_once __DIR__."/DepartmentController.php";
require_once __DIR__."/../dao/Admin.php";
require_once __DIR__."/../sercurity/User.php";
class LoginLogoutAdminController extends DepartmentController
{
    protected static function getLoginPage(): void
    {
        require_once __DIR__."/../view/LoginPage.php";
    }

    protected static function login(): void
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        try{
            $user = Admin::getAdminByName($username);
            if ($user->password == $password)
                $_SESSION['user'] = new User(ROLE::admin, $user->username);
            else throw new WrongPasswordException();
            header("Location: ". Environment_Config::$rootFolder."/staffs?success=dang-nhap-thanh-cong");
        } catch (UserNotExistException | WrongPasswordException $e) {
            header("Location: ". Environment_Config::$rootFolder."/login?error=sai-thong-tin-dang-nhap");
        }
    }
    protected static function logout(): void
    {
        //delete all session variables
        session_unset();

        // destroy the session
        session_destroy();
        header("Location: ". Environment_Config::$rootFolder."/login?success=dang-xuat-thanh-cong");
    }
    public static function getLoginPageCallBack(): string
    {
        return 'self::getLoginPage';
    }

    public static function loginCallBack(): string
    {
        return 'self::login';
    }
    public static function logoutCallBack(): string
    {
        return 'self::logout';
    }
}