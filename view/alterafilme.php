<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title> Alterar</title>
<style>
a {
  text-decoration: none;
}
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
<h3>Alteração de dados de um Filme</h3>
<form id="formBuscar" name="formBuscar" method="post" action="alterafilme.php">
  <label>Informe o código do Filme:
    <input type="number" name="buscaCod" id="buscaCod" required>
  </label>
  <label>
    <input type="submit" name="buttonbuscar" id="buttonbuscar" value="Buscar">
  </label>
</form>

<?php

  function chamaFormAlterar($codigo, $titulo, $descricao, $data_lancamento, $categoria) {

?>

<form id="formAlterar" name="formAlterar" method="post" action="alteraFilme.php">
  <p>
    <label>Título do filme:
      <input type="text" name="titulo" id="titulo" size="30" required value="<?php echo $titulo; ?>">
    </label>
  </p>
  <p>
    <label>Descrição do filme:
    <input type="text" name="descricao" id="descricao" size="30" required value="<?php echo $descricao; ?>">
    </label>
  </p>
  <p>
    <label>Data de publicação:
    <input type="date" name="data_lancamento" id="data_lancamento" size="30" required value="<?php echo $data_lancamento; ?>">
    </label>
  </p>
  <input type="hidden" name="selCod" id="selCod" value="<?php echo $codigo;?>">
  <p>
    <label>Categoria:
    <input type="text" name="categoria" id="categoria" size="30" required  value="<?php echo $categoria; ?>">
    </label>
  </p> 
  
  <p>

    <?php

      include_once("../controller/filmeController.php");
      $obj = new filmeController();

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
  include_once("../controller/filmeController.php");
  $obj = new filmeController();   
  $obj->controlaAlteracao();

?>

  <br>
  <br><br>
  <a href="listafilme.php">
    <button class="btn btn-primary" type="button">Listar</button>
  </a>
  <a href="inserefilme.php">
    <button  class="btn btn-success"  type="button">Cadastrar </button>
  </a>
  <a href="excluifilme.php">
    <button class="btn btn-danger"  type="button">Excluir </button>
  </a><br><br>
  <a href="home.php">
    <button class="btn btn-secondary" type="button">Retornar para a página principal</button>
  </a>

</body>
</html>
