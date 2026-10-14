<?php
ob_start();
session_start();
$con=new mysqli("localhost","root","hello","hotel");
if(mysqli_connect_error())
{
    die("not connected". mysqli_connect_errno().mysqli_connect_error());
}


if(isset ($_REQUEST[submit]))
{
    $in=$con->query("insert into subscribe values(0,'$_REQUEST[email]')");
}
  
?>