<?php
if (isset($_SERVER['HTTP_X_UQ_USER'])) {
    session_name("PHPSESSID");
    session_start();
    $_SESSION['PMA_single_signon_user'] = "root";
    $_SESSION['PMA_single_signon_password'] = "List7Arch7tailor";
    $_SESSION['PMA_single_signon_host'] = 'localhost';
    $_SESSION['PMA_single_signon_token'] = sha1(uniqid(rand(), true));
    session_write_close();
    header('HTTP/1.0 302 Found');
    header('Location: /phpmyadmin/index.php?server=1');
    die();
}

header('HTTP/1.0 403 Forbidden');
die();
