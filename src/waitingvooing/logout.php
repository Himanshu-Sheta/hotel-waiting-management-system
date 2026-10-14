<?php

    require_once 'conect.php';
    $up=$con->query("update userregister set lastlogin='$_SESSION[logintime]' ");
    unset($_SESSION[userid]);
    unset($_SESSION[username]);
    unset($_SESSION[logintime]);
    unset($_SESSION[lastlogin]);

    header('location:index.php');


?>