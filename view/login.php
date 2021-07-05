<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<style>  
* {
  text-align: center;
}
p {
  font-weight: bold;
  color: red;
}
</style>
</head>
<body>
  <h3 style="text-align: center">Login</h3>
  <?php
    include_once("../controller/UsuarioController.php");
    $obj = new usuarioController();
    $obj->controlaConsultaLogin();
  ?>
</body>
</html>