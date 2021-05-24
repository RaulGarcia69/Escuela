<?php
include 'conexion.php';
$email = $_POST['email'];
$password = $_POST['password'];
$usernada = mysqli_real_escape_string($conexion,$email);
$passmd5 = md5($password);
//Administrador
$sql1 = "SELECT * FROM tbl_administradores where Email_admin='{$usernada}' and Password_admin ='{$passmd5}'";
$result1 = mysqli_query($conexion,$sql1);
$num1 = mysqli_num_rows($result1);
echo $num1;
mysqli_free_result($result1);
//Secretaria
$sql2 = "SELECT * FROM tbl_secretaria where Email_secr='{$usernada}' and Password_secr ='{$passmd5}'";
$result2 = mysqli_query($conexion,$sql2);
$num2 = mysqli_num_rows($result2);
echo $num2;
mysqli_free_result($result2);

if ($num1 == 1){
    session_start();
    $_SESSION['email']=$email;
     header("Location:../View/admin.school.php");
}
elseif ($num2 == 1){
    session_start();
    $_SESSION['email']=$email;
     header("Location:../View/admin.school.php");
}
else{
    header("Location:../View/login.php");
}