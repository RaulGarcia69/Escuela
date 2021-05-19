<?php
include 'conexion.php';
$email = $_POST['email'];
$password = $_POST['password'];
$usernada = mysqli_real_escape_string($conexion,$email);
$passmd5 = md5($password);
$sql = "SELECT * FROM tbl_administradores where Email_admin='{$usernada}' and Password_admin ='{$passmd5}'";
$result = mysqli_query($conexion,$sql);
$num = mysqli_num_rows($result);
echo $num;
mysqli_free_result($result);

if ($num == 1){
    session_start();
    $_SESSION['email']=$email;
     header("Location:../View/admin.school.php");
}
else{
    header("Location:../View/login.php");
}