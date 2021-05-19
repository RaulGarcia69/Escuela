<?php
        $nombre=$_POST['nombre'];
        $primerapellido=$_POST['primerapellido'];
        $segundoapellido=$_POST['segundoapellido'];
        $dni=$_POST['dni'];
        $telefono=$_POST['telefono'];
        $email=$_POST['email'];
        $clase=$_POST['clase'];
        
        if($clase=="SMX1"){$class=1;}
        elseif($clase=="SMX2"){$class=2;}
        elseif($clase=="ASIX1"){$class=3;}
        elseif($clase=="ASIX2"){$class=4;}
        elseif($clase=="BATX1"){$class=5;}
        elseif($clase=="BATX2"){$class=6;}
        elseif($clase=="DAW2"){$class=7;}
        include 'conexion.php';
        $sql="insert into tbl_alumne (nom_alu,cognom1_alu,cognom2_alu,dni_alu,telf_alu,email_alu,classe) values ('$nombre','$primerapellido','$segundoapellido','$dni','$telefono','$email',$class);";
        $resultado= mysqli_query($conexion,$sql);
        header("Location:../view/admin.school.php");
?>

