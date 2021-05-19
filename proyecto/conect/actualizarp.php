<?php   $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $primerapellido=$_POST['primerapellido'];
        $segundoapellido=$_POST['segundoapellido'];
        $telefono=$_POST['telefono'];
        $email=$_POST['email'];
        $clase=$_POST['departamento'];
        include 'conexion.php';

        if($clase=="IT"){$class=1;}
        elseif($clase=="LEE"){$class=2;}
        elseif($clase=="CI"){$class=3;}
        elseif($clase=="LE"){$class=4;}

    $resultado= mysqli_query($conexion,"update tbl_professor set nom_prof='$nombre', cognom1_prof='$primerapellido', cognom2_prof='$segundoapellido',telf='$telefono', email_prof='$email', dept='$class' where id_professor=$id;");
    
    header("Location:../view/admin.schoolP.php");
?>

