<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escuela - Iniciar sesion</title>
    <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/login.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <script type="text/javascript" src="../js/script_login.js"></script>
</head>
<body>
<div class="row">
  <div class="login">
    <h1>Inicio de sesión</h1><br>
    <form METHOD='POST' ACTION='../conect/comprobaruser.php' onsubmit="return validar()">
     <h2>Introduce el E-mail<h2>
      <INPUT TYPE='email' id='email' NAME='email' placeholder="Email" class="placeholder"><br><br>
      <h2>Introduce la contraseña<h2>
              <INPUT TYPE='Password' id='password' NAME='password' placeholder="Contrasena" class="placeholder"><br><br>
      <INPUT TYPE='SUBMIT' NAME='crear' VALUE='Iniciar sesión' id='enviar' class="btn btn-outline-primary">
    </form>   
  </div>
</div> 
</body>
</html>