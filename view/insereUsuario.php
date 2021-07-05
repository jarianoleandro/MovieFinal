<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Inserir</title>
<style>
body {
  padding-left: 15px;
  padding-top: 15px;
}
a {
  text-decoration: none;
}
label {
  font-size: 20px;
}
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h3>Cadastro de um novo Usuario</h3>
<form id="formInserirUsuario" name="formInserirUsuario" method="post" action="insereUsuario.php">
  <p>
    <label>Nome do Usuario:
      <input class="form-control" type="text" name="nome" id="nome" size="30" required>
    </label>
  </p>
  <p>
    <label>CPF do Usuario:
      <input class="form-control" type="text" name="cpf" id="cpf" size="30" required>
    </label>
  </p>
  <p>
    <label>Senha do Usuario:
      <input class="form-control" type="text" name="senha" id="senha" size="30" required>
    </label>
  </p>
  <p>

      <?php

        include_once("../controller/usuarioController.php");
        $obj = new usuarioController();

      ?>

    </label>
  </p>  
  <p>
    <label>
      <input class="btn btn-success" type="submit" name="button" id="button" value="Inserir">
    </label>
  </p>
</form>

<br><br>
<a href="listaUsuario.php">
  <button class="btn btn-primary" type="button">Listar</button>
</a>
<a href="alteraUsuario.php">
  <button class="btn btn-warning" type="button">Alterar</button>
</a>
<a href="excluiUsuario.php">
  <button class="btn btn-danger" type="button">Excluir </button>
</a><br><br>
<br>
<a href="home.php">
  <button class="btn btn-secondary" type="button">Retornar para a página principal</button>
</a>

<?php

  $obj->controlaInsercao();

?>

</body>
</html>