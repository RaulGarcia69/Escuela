<?php
        $nombre=$_POST['nombre'];
        $primerapellido=$_POST['primerapellido'];
        $segundoapellido=$_POST['segundoapellido'];
        $telefono=$_POST['telefono'];
        $email=$_POST['email'];
        $clase=$_POST['departamento'];
        
        if($clase=="IT"){$class=1;}
        elseif($clase=="LEE"){$class=2;}
        elseif($clase=="CI"){$class=3;}
        elseif($clase=="LE"){$class=4;}
        
        include 'conexion.php';
        $sql="insert into `tbl_professor`(nom_prof, cognom1_prof, cognom2_prof, email_prof, telf, dept) values ('$nombre','$primerapellido','$segundoapellido','$email','$telefono', $class);";
        $resultado= mysqli_query($conexion,$sql);
        header("Location:../view/admin.schoolP.php");
?>
