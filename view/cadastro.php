<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title> 
</head>
<body>
<h3>Cadastro de um novo usuário</h3>
<form id="formInserir" name="formInserir" method="post" action="cadastro.php">
  <p>
    <label>Usuário:
      <input type="text" name="user" id="user" size="30" minlength="3" pattern="[a-z0-9._%+-]+" required>
    </label>
  </p>
  <p>
    <label>Senha:
    <input type="password" name="pwd" id="pwd" size="30" minlength="6" required>
    </label>
  </p>
  <p>
    <label>E-mail:
    <input type="text" name="cpf" id="cpf" size="30" required>
    </label>
  </p>  
  <p>
    <label>
      <input type="submit" name="button" id="button" value="Inserir">
    </label>
  </p>
</form>
<br>
<a href="../index.php" style="text-decoration: none">
  <button type="button">Retornar para a página principal</button>
</a>
<?php
  // include_once("../include/UserResult.php");
  include_once("../controller/usuarioController.php");
  $obj = new UsuarioController();
  $obj->controlaInsercao();
?>
</body>
</html>
