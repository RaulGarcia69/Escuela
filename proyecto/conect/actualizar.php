<?php   $id=$_POST['id'];
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
        
    $resultado= mysqli_query($conexion,"update tbl_alumne set nom_alu='$nombre', cognom1_alu='$primerapellido', cognom2_alu='$segundoapellido', dni_alu='$dni', telf_alu='$telefono', email_alu='$email', classe='$class' where id_alumne=$id;");
    
    header("Location:../view/admin.school.php");
    ?>

