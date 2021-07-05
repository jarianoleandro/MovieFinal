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
<h3>Exclusão de uma categoria</h3>
<form id="formBuscar" name="formBuscar" method="post" action="excluicategoria.php">
  <label>Informe o código do categoria:
    <input class="form-control" type="number" name="buscaCod" id="buscaCod" required>
  </label>
  <label>
    <input class="btn btn-primary" type="submit" name="buttonbuscar" id="buttonbuscar" value="Buscar">
  </label>
</form>

<?php

  function chamaFormExcluir($codigo, $nome, $descricao)
  {
    
?>

<form id="formExcluir" name="formExcluir" method="post" action="excluicategoria.php" onsubmit="return confirm('Você tem certeza que deseja excluir esta categoria?');">
  <input type="hidden" name="selCod" id="selCod" value="<?php echo $codigo;?>">
  <p>
    <p>
      <label>Categoria:
        <input class="form-control" type="text" name="descricao" id="descricao" size="30" value="<?php echo $descricao;?>" readonly>
      </label>
    </p>

    <label>Descrição:
      <input class="form-control" type="text" name="nome" id="nome" size="30" value="<?php echo $nome;?>" readonly>
    </label>
  </p>
  <p>

    <?php
      
      include_once("../controller/categoriaController.php");
      $obj = new categoriaController();

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
  include_once("../controller/categoriaController.php");
  $obj = new categoriaController();   
  $obj->controlaExclusao();

?>

<br>
<br><br>
<a href="listacategoria.php">
  <button class="btn btn-primary" type="button">Listar</button>
</a>
<a href="inserecategoria.php">
  <button class="btn btn-success" type="button">Cadastrar </button>
</a>
<a href="alteracategoria.php">
  <button class="btn btn-warning" type="button">Alterar</button>
</a>
<br><br>
<a href="home.php">
  <button class="btn btn-secondary" type="button">Retornar para a página principal</button>
</a>

</body>
</html>