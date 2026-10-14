<?php

require_once 'conect.php';

//Area
if (isset($_REQUEST[inarea])) {
    $check = $con->query("select * from area where name like '$_REQUEST[name]'");
    $checkrow = mysqli_fetch_array($check);
    if ($checkrow[0] == "") {
        $in = $con->query("insert into area values(0,'$_REQUEST[name]')");
    } else {
        $_SESSION[er1] = 1;
    }
}
if (isset($_REQUEST[uparea])) {
    $check = $con->query("select * from area where name like '$_REQUEST[name]'");
    $checkrow = mysqli_fetch_array($check);
    if ($checkrow[0] == "") {
        $up = $con->query("update area set name='$_REQUEST[upname]' where areaid='$_SESSION[id]'");
    } else {
        $_SESSION[er1] = 1;
    }
    unset($_SESSION[id]);
}

//package

if (isset($_REQUEST[inpackage])) {

    $check = $con->query("select * from package where name like '$_REQUEST[name]'");
    $checkrow = mysqli_fetch_array($check);
    if ($checkrow[0] == "") {


        $newname = $_REQUEST[name] . "." . substr($_FILES[package][type], 6);
        $setpath = dirname(__FILE__) . "/package/" . $newname;
        $path = "package/" . $newname;
        move_uploaded_file($_FILES[package][tmp_name], $setpath);

        $in = $con->query("insert into package values(0,'$_REQUEST[name]',$_REQUEST[duration],$_REQUEST[amount],'$path')");
    } else {
        $_SESSION[er1] = 1;
    }
}


if (isset($_REQUEST[uppackage])) {
    $check = $con->query("select * from package where name like '$_REQUEST[upname]'");
    $checkrow = mysqli_fetch_array($check);
    if ($checkrow[0] == "") {
      
     //echo ("update package set name='$_REQUEST[upname]',duration=$_REQUEST[upduration],amount='$_REQUEST[upamount]' where  packageid='$_SESSION[id]'");
 
    
        
        
       $up=$con->query("update package set name='$_REQUEST[upname]',duration=$_REQUEST[upduration],amount='$_REQUEST[upamount]' where packageid='$_SESSION[id]'");
           unset($_SESSION[id]);
        } else {
        $_SESSION[er1] = 1;
    }
    
    
}

//end package
//landmark

if (isset($_REQUEST[inlandmark])) {

    $check = $con->query("select * from landmark where name like '$_REQUEST[name]'");
    $checkrow = mysqli_fetch_array($check);
    if ($checkrow[0] == "") {

        $in = $con->query("insert into landmark values($_REQUEST[areaid],0,'$_REQUEST[name]')");
    } else {
        $_SESSION[er1] = 1;
    }
}
if (isset($_REQUEST[uplandmark])) {

    $check = $con->query("select * from landmark where name like '$_REQUEST[upname]'");
    $checkrow = mysqli_fetch_array($check);
    if ($checkrow[0] == "") {
        $up = $con->query("update landmark set name='$_REQUEST[upname]' where landmarkid='$_SESSION[landmark]'");
        // echo ("update landmark set name='$_REQUEST[upname]' where landmarkid='$_SESSION[landmark]'");
    } else {
        $_SESSION[er1] = 1;
    }
    unset($_SESSION[id]);
}

//end landmark
//counter

$c1 = $con->query("select count(*) from area");
$cc1 = mysqli_fetch_array($c1);
$_SESSION[area] = $cc1[0];


$c1 = $con->query("select count(*) from landmark");
$cc1 = mysqli_fetch_array($c1);
$_SESSION[landmark] = $cc1[0];


$c1 = $con->query("select count(*) from userregister");
$cc1 = mysqli_fetch_array($c1);
$_SESSION[user] = $cc1[0];



$c1 = $con->query("select count(*) from inquiry");
$cc1 = mysqli_fetch_array($c1);
$_SESSION[inquiry] = $cc1[0];



$c1 = $con->query("select count(*) from package");
$cc1 = mysqli_fetch_array($c1);
$_SESSION[package] = $cc1[0];
?>




