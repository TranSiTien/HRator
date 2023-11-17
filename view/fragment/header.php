
<header>
    <div class="header">
    <a href="#" class="logo">Quản lí Nhân viên</a>
    <div class="header-right">
        <div class="auth-buttons">
            <?php if (!isset($_SESSION['user'])) { ?>
            <button><a href="<?=Environment_Config::$rootFolder?>/login">Đăng nhập</a></button>
            <?php } else { ?>
                <form id="logout" action="<?=Environment_Config::$rootFolder?>/logout" method="post"></form>
                <button type="submit" form="logout"><a>Đăng xuất</a></button>
            <?php }?>
        </div>
    </div>
    </div>
</header>