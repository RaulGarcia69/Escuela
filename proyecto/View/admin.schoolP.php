<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escuela - Administracion del Colegio</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script type="text/javascript" src="../js/script_admin.js"></script>
</head>
<body>
<?php
session_start();
$conexion = mysqli_connect("localhost","root","","curs");
//$conexion = mysqli_connect("172.24.16.160","admin","qweQWE123","curs");
?>
    
        <!--CREAR-->
    <div class="form-style-2 nover" id="crear">
    <?php
    echo "<div class='form-style-2-heading'>Crear profesor";
    echo "<a onclick='closeForm()' id='cerrar-crear'><img src='../img/cerrar.png'></a>";
    echo "</div>";
    echo "<form action='../conect/crear.profesor.php' method='post' id='form-crear'>";
    echo "<div class='labels'>";
    echo "<label>Nombre</label>";
    echo "<label>Primer Apellido</label>";
    echo "<label>Segundo Apellido</label>";
    echo "<label>Telefono</label>";
    echo "<label>Email</label>";
    echo "<label>Departamento</label>"; 
    echo "</div>";
    echo "<div class='inputs'>";
    echo "<input type='text' class='input-field' name='nombre' required></input>";
    echo "<input type='text' class='input-field' name='primerapellido' required></input>";
    echo "<input type='text' class='input-field' name='segundoapellido' required></input>";
    echo "<input type='text' class='input-field' name='telefono' required></input>";
    echo "<input type='text' class='input-field' name='email' required></input>";
    echo "<input type='text' class='input-field' name='departamento' required></input>";
    echo "</div>";
    echo "<INPUT TYPE='SUBMIT' VALUE='Crear' class='btn btn-secondary' id='crear-boton'>";
    echo "</form>";
    ?>
    </div>
    
    <!--FILTRO -->
    <div class="form-style-2 nover" id="filtrar">
    
     <?php
    echo "<div class='form-style-2-heading'>Filtrar datos";
    echo "<a onclick='closeForm()'><img src='../img/cerrar.png'></a>";
    echo "</div>";
    echo "<form action='admin.schoolP.php' method='post' id='form-filtro'>";
    echo "<div class='labels'>";
    echo "<label>Nombre</label>";
    echo "<label>Primer Apellido</label>";
    echo "<label>Segundo Apellido</label>";
    echo "<label>Telefono</label>";
    echo "<label>Email</label>";
    echo "<label>Departamento</label>";
    
    echo "</div>";
    
    
    echo "<div class='inputs'>";
    echo "<input type='text' class='input-field' name='nombre'></input>";
    echo "<input type='text' class='input-field' name='primerapellido'></input>";
    echo "<input type='text' class='input-field' name='segundoapellido'></input>";
    echo "<input type='text' class='input-field' name='telefono'></input>";
    echo "<input type='text' class='input-field' name='email' ></input>";
    echo "<input type='text' class='input-field' name='departamento'></input>";
    echo "</div>";
    echo "<INPUT TYPE='SUBMIT' VALUE='Filtrar' class='btn btn-secondary' id='filtrar-boton'>";
    echo "</form>"; 
     ?>
    </div>

    

 <?php
    
    
    $filtro=""; 
    $sql="select tbl_professor.id_professor, tbl_professor.nom_prof, tbl_professor.cognom1_prof,tbl_professor.cognom2_prof,tbl_professor.telf,tbl_professor.email_prof,tbl_dept.codi_dept from tbl_professor inner join tbl_dept on tbl_professor.dept=tbl_dept.id_dept where tbl_professor.id_professor like '%$filtro%'";
    $sql_cont="select COUNT(tbl_professor.id_professor) as 'cuantos' from tbl_professor inner join tbl_dept on tbl_professor.dept=tbl_dept.id_dept where id_professor like '%$filtro%'";
    
    if(!empty($_SESSION['email'])){  
        
        //MODIFICAR
        if(isset($_SESSION["modificar_prof"]))
        {
        $id=$_SESSION['modificar_prof'];      
        echo "<div class='form-style-2' id='modificar' onload='openFormMod()'>";
        $sql_mod="select tbl_professor.id_professor, tbl_professor.nom_prof, tbl_professor.cognom1_prof,tbl_professor.cognom2_prof,tbl_professor.telf,tbl_professor.email_prof,tbl_dept.codi_dept from tbl_professor inner join tbl_dept on tbl_professor.dept=tbl_dept.id_dept where id_professor=$id;";
        $resultado_mod=mysqli_query($conexion,$sql_mod);
        echo "<div class='form-style-2-heading'>Modificar";
        echo "<a onclick='closeForm()' id='cerrar-modificar'><img src='../img/cerrar.png'></a>";
        echo "</div>";
        echo "<form action='../conect/actualizarp.php' method='post' id='form-modificar'>";
        echo "<div class='labels'>";
        echo "<label>Nombre</label>";
        echo "<label>Primer Apellido</label>";
        echo "<label>Segundo Apellido</label>";
        echo "<label>Telefono</label>";
        echo "<label>Email</label>";
        echo "<label>Departamento</label>";
    
        echo "</div>";
    
        if ($alumne_mod=mysqli_fetch_array($resultado_mod))
        {
            echo "<div class='inputs'>";
            echo "<input type='hidden' name='id' value='$id'>";
            echo "<input type='text' class='input-field' name='nombre' value='$alumne_mod[nom_prof]' required></input>";
            echo "<input type='text' class='input-field' name='primerapellido'  value='$alumne_mod[cognom1_prof]' required></input>";
            echo "<input type='text' class='input-field' name='segundoapellido'  value='$alumne_mod[cognom2_prof]' required></input>";
            echo "<input type='text' class='input-field' name='telefono'  value='$alumne_mod[telf]' required></input>";
            echo "<input type='text' class='input-field' name='email'  value='$alumne_mod[email_prof]' required></input>";
            echo "<input type='text' class='input-field' name='departamento'  value='$alumne_mod[codi_dept]' required></input>";
            echo "</div>";
            echo "<INPUT TYPE='SUBMIT' VALUE='Modificar' class='btn btn-secondary' id='modificar-boton'>";
            echo "</form>";
        }
        echo "</div>";
        unset($_SESSION["modificar_prof"]);
        echo "<div id='pagina' class='desactivar'>";
    }
        
   ?>
<div id="pagina">
<div class="row">
<div class="hola"><p>Hola <?php echo $_SESSION['email']?></div>
<div class="log_out"><a href='../conect/Kill.php' class="log_out"><img src="../img/salir.png"/></a></div>
</div>
<div class="row">
<div class="libro">
    <a href='admin.school.php'class="btn btn-secondary">Ver alumnos</a>
<button class="btn btn-secondary" onclick="openFormCrear()">Añadir profesor</button>
<button class="btn btn-secondary" onclick="openForm()">Filtrar</button>  
</div>
    
    
<div class="filtro">
    <a href='../conect/csv.profesores.php'class="btn btn-success">Exportar profesores</a>
</div> 
   <?php     
        
    if(isset($_POST["nombre"])){
       $nombre=$_POST['nombre'];
       $sql_nombre=" and tbl_professor.nom_prof like '%$nombre%'";
       $sql=$sql.$sql_nombre;
       $sql_cont=$sql_cont.$sql_nombre;
    }
    if(isset($_POST["primerapellido"])) {
        $primerapellido=$_POST['primerapellido'];
        $sql_primerapellido=" and tbl_professor.cognom1_prof like '%$primerapellido%'";
        $sql=$sql.$sql_primerapellido;
        $sql_cont=$sql_cont.$sql_primerapellido;
}
    if(isset($_POST["segundoapellido"])) {
        $segundoapellido=$_POST['segundoapellido'];
        $sql_segundoapellido=" and tbl_professor.cognom2_prof like '%$segundoapellido%'";
        $sql=$sql.$sql_segundoapellido;
        $sql_cont=$sql_cont.$sql_segundoapellido;
}
    if(isset($_POST["telefono"])) {
        $telefono=$_POST['telefono'];
        $sql_telefono=" and tbl_professor.telf like '%$telefono%'";
        $sql=$sql.$sql_telefono;
        $sql_cont=$sql_cont.$sql_telefono;
}
    if(isset($_POST["email"])) {
        $email=$_POST['email'];
        $sql_email=" and tbl_professor.email_prof like '%$email%'";
        $sql=$sql.$sql_email;
        $sql_cont=$sql_cont.$sql_email;
}
    if(isset($_POST["departamento"])) {
        $dept=$_POST['departamento'];
        $sql_dept=" and tbl_dept.codi_dept like '%$dept%'";
        $sql=$sql.$sql_dept;
        $sql_cont=$sql_cont.$sql_dept;
}
    
    $sql_puntocoma=";";
    $sql=$sql.$sql_puntocoma;
    $sql_cont=$sql_cont.$sql_puntocoma;
    
    
    
    $result_cont = mysqli_query($conexion,$sql_cont);
    $result = mysqli_query($conexion,$sql);
    
    
    echo "<div class='cantidad'>";
    while ($fila = mysqli_fetch_row($result_cont)) {
    echo "Se encontraron {$fila[0]} registros<br>";
}
    echo "</div>";
    
    
    
?>
    <table class='table'>
    <tr>
    <th class="centro">Nombre</th>
    <th class="centro">Primer Apellido</th>
    <th class="centro">Segundo Apellido</th>
    <th class="centro">Telefono</th>
    <th class="centro">Email</th>
    <th class="centro">Departamento</th>
    <th class="centro">Administrar</th>
    </tr>
<?php
    foreach ($result as $registro){
        ?>
        <tr>
        <td><?php echo"{$registro['nom_prof']}";?></td>
        <td><?php echo"{$registro['cognom1_prof']}";?></td>
        <td><?php echo"{$registro['cognom2_prof']}";?></td>
        <td><?php echo"{$registro['telf']}";?></td>
        <td><?php echo"{$registro['email_prof']}";?></td>
        <td><?php echo"{$registro['codi_dept']}";?></td>
        <form METHOD='POST' action='../conect/eliminar.actualizarprof.php'>
        <input type='hidden' name='id' value=<?php echo"{$registro['id_professor']}";?>>
        <td>
            <button type='submit' value='Eliminar' onclick="return confirm('Quieres Eliminar?')"class="btn btn-danger"><i class="fas fa-adjust d-sm-none"></i><span class="d-none d-sm-inline">Eliminar</span></button>
            <button type='submit' value='Modificar' name="modificar" class='btn btn-primary'><i class="fas fa-adjust d-sm-none"></i><span class="d-none d-sm-inline">Modificar</span></button>
        </td>
        </form>
        </tr>
    <?php 
    }
    
        
     ?>
    </table>
    </div>
    </div>
    
    
    
   
    
    

    <?php
}
    







else{
    header("Location:login.php");
}
?>
</body>
</html>