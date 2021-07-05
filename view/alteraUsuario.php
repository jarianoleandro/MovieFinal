<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Alterar</title>
<style>
a {
  text-decoration: none;
}
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
<h3>Alteração de dados de um Usuario</h3>
<form id="formBuscar" name="formBuscar" method="post" action="alteraUsuario.php">
  <label>Informe o código do Usuario:
    <input type="number" name="buscaCod" id="buscaCod" required>
  </label>
  <label>
    <input type="submit" name="buttonbuscar" id="buttonbuscar" value="Buscar">
  </label>
</form>

<?php

  function chamaFormAlterar($codigo, $nome, $cpf) {

?>

<form id="formAlterar" name="formAlterar" method="post" action="alteraUsuario.php">
  <p>
    <label>CPF:
      <input type="text" name="cpf" id="cpf" size="30" value="<?php echo $cpf;?>" required>
    </label>
  </p>
  <input type="hidden" name="selCod" id="selCod" value="<?php echo $codigo;?>">
  <p>
    <label>Nome:
     <input class="te" type="text"  name="nome" id="nome" size=""  value="<?php echo $nome;?>" required>
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
      <input type="submit" name="button" id="button" value="Alterar">
    </label>
  </p>
</form>

<?php

  }
  include_once("../controller/usuarioController.php");
  $obj = new usuarioController();   
  $obj->controlaAlteracao();

?>

  <br>
  <br><br>
  <a href="listaUsuario.php">
    <button class="btn btn-primary" type="button">Listar</button>
  </a>
  <a href="insereUsuario.php">
    <button class="btn btn-success" type="button">Cadastrar</button>
  </a>
  <a href="excluiUsuario.php">
    <button class="btn btn-danger" type="button">Excluir</button>
  </a><br><br>
  <a href="home.php">
    <button  class="btn btn-secondary" type="button">Retornar para a página principal</button>
  </a>

</body>
</html>
