<?php
$id=$_POST['id'];
include 'conexion.php';

if(isset($_POST["modificar"])){
    session_start();
    $_SESSION['modificar_alu']=$id;
    header("Location:../view/admin.school.php");
    
}
else {
    mysqli_query($conexion,"DELETE FROM tbl_alumne WHERE id_alumne=$id");
    header("Location:../view/admin.school.php");
}


?>