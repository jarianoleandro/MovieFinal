<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<style>

a {
  text-decoration: none;
}
label {
  font-size: 20px;
}
p {
  font-size: 10px;
}
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h3 style="text-align: center">Login</h3>
<form id="form1" style="text-align: center" name="form1" method="post" action="login.php">
  <p>
    <label>CPF do usuário:
      <input class="form-control" type="text" name="cpf" id="cpf" required>
    </label>
  </p>
  <p>
    <label>Senha:
      <input class="form-control" type="password" name="pwd" id="pwd" required>
    </label>
  </p>
  <p>
    <label>
      <input class="btn btn-success" type="submit" name="enviar" id="enviar" value="Enviar">
    </label>
  </p>
</form>
<p id="novo" style="text-align: center">Ainda não possui cadastro? Faça seu registro <a href="insereUsuarioNovo.php" target="_self">aqui</a></p>
</body>
</html>
