<?php
$id=$_POST['id'];
include 'conexion.php';

if(isset($_POST["modificar"])){
    session_start();
    $_SESSION['modificar_prof']=$id;
    header("Location:../view/admin.schoolP.php");
    
}
else {
    mysqli_query($conexion,"DELETE FROM tbl_professor WHERE id_professor=$id");
    header("Location:../view/admin.schoolP.php");
}


?>