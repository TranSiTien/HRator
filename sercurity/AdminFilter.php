<?php
include_once __DIR__."/Filter.php";
class AdminFilter implements Filter {
    public static function handle(): void
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']->getRole() !== ROLE::admin) {
            header("Location: ". Environment_Config::$rootFolder."/login?error=Khong-co-quyen-truy-cap");
            die("oke");
        }
    }
}
