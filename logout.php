<?php
session_start();
$_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_unset();// $_session value unset
    session_destroy();// $_SESSION destroy
    header('cache-control:no-cache, no-store, no-revalidate');
    header('pragma:no-cache');
    header('Expires:0');
    header('Location:login.php');
    exit;
?>