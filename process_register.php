<?php
session_start();
$name=$email=$password=$id="";
if(isset($_POST['name']))
{
    $name=$_POST['name'];
}
if(isset($_POST['email']))
{
    $email=$_POST['email'];
}
if(isset($_POST['password']))
{
    $password=$_POST['password'];
}
require_once('connect.php');

$sql="select count(*) from user where email='$email'";
$result=mysqli_query($connect,$sql);
$each=mysqli_fetch_array($result)['count(*)'];
if($each==1)
{
    header('location:dangky.php?erro=Email da ton tai');
    exit();
}
$sql="insert into user(name, email, password) values('$name','$email','$password')";
mysqli_query($connect,$sql);
header('location:login.php');
$sql="select id from user where email='$email'";
$result=mysqli_query($connect,$sql);
$each=mysqli_fetch_array($result)['id'];
$_SESSION['id']=$id;
$_SESSION['name']=$name;
mysqli_close($connect);

?>