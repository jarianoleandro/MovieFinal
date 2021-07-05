<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title> Inserir</title>
<style>
a {
  text-decoration: none;
}
body {
  padding-left: 15px;
  padding-top: 15px;
}
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h3>Cadastro de um novo filme</h3>
<form id="formInserirFilme" name="formInserirFilme" method="post" action="inserefilme.php">
  <p>
    <label>Título do filme:
      <input class="form-control" type="text" name="titulo" id="titulo" size="30" required>
    </label>
  </p>
  <p>
    <label>Descrição do filme:
    <input class="form-control" type="text" name="descricao" id="descricao" size="30" required>
    </label>
  </p>
  <p>
    <label>Data de publicação:
    <input class="form-control" type="date" name="data_lancamento" id="data_lancamento" size="30" required>
    </label>
  </p>
  <p>
    <label>Categoria:
    <input class="form-control" type="text" name="categoria" id="categoria" size="30" required>

    <?php

    include_once("../controller/filmeController.php");
    $obj = new filmeController();

    ?>

    </label>
  </p> 
  <p>
    <label>
      <input class="btn btn-success" type="submit" name="button" id="button" value="Inserir">
    </label>
  </p>
</form>
<br>
<a href="home.php">
  <button class="btn btn-secondary" type="button">Retornar para a página principal</button>
</a>

<?php

$obj->controlaInsercao();

?>

</body>
</html>