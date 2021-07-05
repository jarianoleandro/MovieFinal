<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Excluir</title>
<style>
a {
  text-decoration: none;
}
body {
  padding-left: 15px;
}
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
<h3>Exclusão de um Usuario</h3>
<form id="formBuscar" name="formBuscar" method="post" action="excluiUsuario.php">
  <label>Informe o código do Usuario:
    <input class="form-control" type="number" name="buscaCod" id="buscaCod" required>
  </label>
  <label>
    <input class="btn btn-primary" type="submit" name="buttonbuscar" id="buttonbuscar" value="Buscar">
  </label>
</form>

<?php

  function chamaFormExcluir($codigo, $nome, $cpf)
  {
    
?>

<form id="formExcluir" name="formExcluir" method="post" action="excluiUsuario.php" onsubmit="return confirm('Você tem certeza que deseja excluir este Usuario?');">
  <input type="hidden" name="selCod" id="selCod" value="<?php echo $codigo;?>">
  <p>
    <p>
      <label>CPF:
        <input class="form-control" type="text" name="cpf" id="cpf" size="30" value="<?php echo $cpf;?>" readonly>
      </label>
    </p>

    <label>Nome:
      <input class="form-control"  type="text" name="nome" id="nome" size="30" value="<?php echo $nome;?>" readonly>
    </label>
  </p>
  <p>

    <?php
      
      include_once("../controller/usuarioController.php");
      $obj = new usuarioController();

    ?>

  </select>
  </label>
  </p>  
  <p>
    <label>
      <input class="btn btn-success" type="submit" name="button" id="button" value="Confirma exclusão?">
    </label>
  </p>
</form>

<?php

  }
  include_once("../controller/usuarioController.php");
  $obj = new usuarioController();   
  $obj->controlaExclusao();

?>

<br>
<br><br>
<a href="listaUsuario.php">
  <button class="btn btn-primary" type="button">Listar</button>
</a>
<a href="insereUsuario.php">
  <button class="btn btn-success" type="button">Cadastrar </button>
</a>
<a href="alteraUsuario.php">
  <button class="btn btn-warning" type="button">Alterar</button>
</a>
<br><br>
<a href="home.php">
  <button class="btn btn-secondary" type="button">Retornar para a página principal</button>
</a>

</body>
</html>