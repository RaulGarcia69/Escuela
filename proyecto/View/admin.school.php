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
    $sql_clase="SELECT tbl_classe.codi_classe from tbl_classe;";
    $resultado_crear=mysqli_query($conexion,$sql_clase);
    echo "<div class='form-style-2-heading'>Crear alumno";
    echo "<a onclick='closeForm()' id='cerrar-crear'><img src='../img/cerrar.png'></a>";
    echo "</div>";
    echo "<form action='../conect/crear.alumno.php' method='post' id='form-crear' onsubmit='return validar()'>";
    echo "<div class='labels'>";
    echo "<label>Nombre</label>";
    echo "<label>Primer Apellido</label>";
    echo "<label>Segundo Apellido</label>";
    echo "<label>DNI</label>";
    echo "<label>Telefono</label>";
    echo "<label>Email</label>";
    echo "<label>Clase</label>"; 
    echo "</div>";
    echo "<div class='inputs'>";
    echo "<input type='text' class='input-field' name='nombre' id='nombre-crear'></input>";
    echo "<input type='text' class='input-field' name='primerapellido' id='primerapellido-crear'></input>";
    echo "<input type='text' class='input-field' name='segundoapellido' id='segundoapellido-crear'></input>";
    echo "<input type='text' class='input-field' name='dni' id='dni-crear'></input>";
    echo "<input type='text' class='input-field' name='telefono' id='telefono-crear'></input>";
    echo "<input type='text' class='input-field' name='email' id='email-crear'></input>";
    echo "<select class='select-field-a' name='clase' id='clase-crear'>";
    foreach ($resultado_crear as $clase){
        echo "<option value='{$clase['codi_classe']}'>{$clase['codi_classe']}</option>";
    }
    echo "</select>";
    echo "</div>";
    echo "<INPUT TYPE='SUBMIT' VALUE='Crear' class='btn btn-secondary' id='crear-boton'>";
    echo "</form>";
    ?>
    </div>
    
    <!--FILTRO -->
    <div class="form-style-2 nover" id="filtrar">
    
     <?php
    echo "<div class='form-style-2-heading'>Filtrar datos";
    echo "<a onclick='closeForm()' id='cerrar-filtro'><img src='../img/cerrar.png' ></a>";
    echo "</div>";
    echo "<form action='admin.school.php' method='post' id='form-filtro'>";
    echo "<div class='labels'>";
    echo "<label>Nombre</label>";
    echo "<label>Primer Apellido</label>";
    echo "<label>Segundo Apellido</label>";
    echo "<label>DNI</label>";
    echo "<label>Telefono</label>";
    echo "<label>Email</label>";
    echo "<label>Clase</label>";
    
    echo "</div>";
    
    
    echo "<div class='inputs'>";
    echo "<input type='text' class='input-field' name='nombre'></input>";
    echo "<input type='text' class='input-field' name='primerapellido'></input>";
    echo "<input type='text' class='input-field' name='segundoapellido'></input>";
    echo "<input type='text' class='input-field' name='dni'></input>";
    echo "<input type='text' class='input-field' name='telefono'></input>";
    echo "<input type='text' class='input-field' name='email'></input>";
    echo "<input type='checkbox' onclick='activara()' id='checkbox'>";
    echo "<select class='select-field-af' name='clase' id='clase-filtro' disabled>";
    foreach ($resultado_crear as $clase){
        echo "<option value='{$clase['codi_classe']}'>{$clase['codi_classe']}</option>";
    }
    echo "</select>";
    echo "</div>";
    echo "<INPUT TYPE='SUBMIT' VALUE='Filtrar' class='btn btn-secondary' id='filtrar-boton'>";
    echo "</form>"; 
     ?>
    </div>

    

 <?php
    
    
    $filtro=""; 
    $sql="select tbl_alumne.id_alumne, tbl_alumne.dni_alu, tbl_alumne.nom_alu, tbl_alumne.cognom1_alu,tbl_alumne.cognom2_alu,tbl_alumne.telf_alu,tbl_alumne.email_alu,tbl_classe.codi_classe from tbl_alumne inner join tbl_classe on tbl_alumne.classe=tbl_classe.id_classe where tbl_alumne.id_alumne like '%$filtro%'";
    $sql_cont="select COUNT(tbl_alumne.id_alumne) as 'cuantos' from tbl_alumne inner join tbl_classe on tbl_alumne.classe=tbl_classe.id_classe where tbl_alumne.id_alumne like '%$filtro%'";
    
    if(!empty($_SESSION['email'])){  
        
        //MODIFICAR
        if(isset($_SESSION["modificar_alu"]))
        {
        $id=$_SESSION['modificar_alu'];      
        echo "<div class='form-style-2' id='modificar' onload='openFormMod()'>";
        $sql_mod="select tbl_alumne.id_alumne, tbl_alumne.dni_alu, tbl_alumne.nom_alu, tbl_alumne.cognom1_alu,tbl_alumne.cognom2_alu,tbl_alumne.telf_alu,tbl_alumne.email_alu,tbl_classe.codi_classe from tbl_alumne inner join tbl_classe on tbl_alumne.classe=tbl_classe.id_classe where id_alumne=$id;";
        $resultado_mod=mysqli_query($conexion,$sql_mod);
        echo "<div class='form-style-2-heading'>Modificar";
        echo "<a onclick='closeForm()' id='cerrar-modificar'><img src='../img/cerrar.png'></a>";
        echo "</div>";
        echo "<form action='../conect/actualizar.php' method='post' id='form-modificar' onsubmit='return validarmod()'>";
        echo "<div class='labels'>";
        echo "<label>Nombre</label>";
        echo "<label>Primer Apellido</label>";
        echo "<label>Segundo Apellido</label>";
        echo "<label>DNI</label>";
        echo "<label>Telefono</label>";
        echo "<label>Email</label>";
        echo "<label>Clase</label>";
    
        echo "</div>";
    
        if ($alumne_mod=mysqli_fetch_array($resultado_mod))
        {
            echo "<div class='inputs'>";
            echo "<input type='hidden' name='id' value='$id'>";
            echo "<input type='text' class='input-field' name='nombre' value='$alumne_mod[nom_alu]' id='nombre-mod'></input>";
            echo "<input type='text' class='input-field' name='primerapellido'  value='$alumne_mod[cognom1_alu]' id='primerapellido-mod'></input>";
            echo "<input type='text' class='input-field' name='segundoapellido'  value='$alumne_mod[cognom2_alu]' id='segundoapellido-mod'></input>";
            echo "<input type='text' class='input-field' name='dni'  value='$alumne_mod[dni_alu]' id='dni-mod'></input>";
            echo "<input type='text' class='input-field' name='telefono'  value='$alumne_mod[telf_alu]' id='telefono-mod'></input>";
            echo "<input type='text' class='input-field' name='email'  value='$alumne_mod[email_alu]' id='email-mod'></input>";
            $sql_clase="SELECT tbl_classe.codi_classe from tbl_classe where tbl_classe.codi_classe<>'{$alumne_mod['codi_classe']}';";
            $resultado_crear=mysqli_query($conexion,$sql_clase);
            echo "<select class='select-field-a' name='clase' id='clase-mod'>";
            echo "<option value='{$alumne_mod['codi_classe']}'>{$alumne_mod['codi_classe']}</option>";
            foreach ($resultado_crear as $clase){
                echo "<option value='{$clase['codi_classe']}'>{$clase['codi_classe']}</option>";
            }
            echo "</select>";
            echo "</div>";
            echo "<INPUT TYPE='SUBMIT' VALUE='Modificar' class='btn btn-secondary' id='modificar-boton'>";
            echo "</form>";
    }
        echo "</div>";
        unset($_SESSION["modificar_alu"]);
        echo "<div id='pagina' class='desactivar'>";
        }
        
   ?>
<div id="pagina">
<div class="row">
<div class="hola"><p>Bienvenido <?php echo $_SESSION['email']?></div>
<div class="log_out"><a href='../conect/Kill.php' class="log_out"><img src="../img/salir.png"/></a></div>
</div>
<div class="row">
<div class="libro">
    <a href='admin.schoolP.php'class="btn btn-secondary">Ver profesores</a>
<button class="btn btn-secondary" onclick="openFormCrear()">A??adir alumno</button>
<button class="btn btn-secondary" onclick="openForm()">Filtrar</button>  
</div>
    
    
<div class="filtro">
    <a href='../conect/csv.alumnos.php'class="btn btn-success">Exportar alumnos</a>
</div> 
   <?php     
        
    if(isset($_POST["nombre"])){
       $nombre=$_POST['nombre'];
       $sql_nombre=" and tbl_alumne.nom_alu like '%$nombre%'";
       $sql=$sql.$sql_nombre;
       $sql_cont=$sql_cont.$sql_nombre;
    }
    if(isset($_POST["primerapellido"])) {
        $primerapellido=$_POST['primerapellido'];
        $sql_primerapellido=" and tbl_alumne.cognom1_alu like '%$primerapellido%'";
        $sql=$sql.$sql_primerapellido;
        $sql_cont=$sql_cont.$sql_primerapellido;
}
    if(isset($_POST["segundoapellido"])) {
        $segundoapellido=$_POST['segundoapellido'];
        $sql_segundoapellido=" and tbl_alumne.cognom2_alu like '%$segundoapellido%'";
        $sql=$sql.$sql_segundoapellido;
        $sql_cont=$sql_cont.$sql_segundoapellido;
}
    if(isset($_POST["dni"])) {
        $dni=$_POST['dni'];
        $sql_dni=" and tbl_alumne.dni_alu like '%$dni%'";
        $sql=$sql.$sql_dni;
        $sql_cont=$sql_cont.$sql_dni;
}
    if(isset($_POST["telefono"])) {
        $telefono=$_POST['telefono'];
        $sql_telefono=" and tbl_alumne.telf_alu like '%$telefono%'";
        $sql=$sql.$sql_telefono;
        $sql_cont=$sql_cont.$sql_telefono;
}
    if(isset($_POST["email"])) {
        $email=$_POST['email'];
        $sql_email=" and tbl_alumne.email_alu like '%$email%'";
        $sql=$sql.$sql_email;
        $sql_cont=$sql_cont.$sql_email;
}
    if(isset($_POST["clase"])) {
        $clase=$_POST['clase'];
        $sql_clase=" and tbl_classe.codi_classe like '%$clase%'";
        $sql=$sql.$sql_clase;
        $sql_cont=$sql_cont.$sql_clase;
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
    <th class="centro">DNI</th>
    <th class="centro">Telefono</th>
    <th class="centro">Email</th>
    <th class="centro">Clase</th>
    <th class="centro">Administrar</th>
    </tr>
<?php
    foreach ($result as $registro){
        ?>
        <tr>
        <td><?php echo"{$registro['nom_alu']}";?></td>
        <td><?php echo"{$registro['cognom1_alu']}";?></td>
        <td><?php echo"{$registro['cognom2_alu']}";?></td>
        <td><?php echo"{$registro['dni_alu']}";?></td>
        <td><?php echo"{$registro['telf_alu']}";?></td>
        <td><?php echo"{$registro['email_alu']}";?></td>
        <td><?php echo"{$registro['codi_classe']}";?></td>
        <form METHOD='POST' action='../conect/eliminar.actualizar.php'>
        <input type='hidden' name='id' value=<?php echo"{$registro['id_alumne']}";?>>
        <td>
            <button type='submit' value='Eliminar' onclick="return confirm('Quieres Eliminar a <?php echo"{$registro['nom_alu']}" ?>?')"class="btn btn-danger"><i class="fas fa-adjust d-sm-none"></i><span class="d-none d-sm-inline">Eliminar</span></button>
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

