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
  padding-left: 10px;
}
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h3>Exclusão de um filme</h3>
<form id="formBuscar" name="formBuscar" method="post" action="excluifilme.php">
  <label>Informe o código do filme:
    <input class="form-control" type="number" name="buscaCod" id="buscaCod" required>
  </label>
  <label>
    <input class="btn btn-primary" type="submit" name="buttonbuscar" id="buttonbuscar" value="Buscar">
  </label>
</form>

<?php
  function chamaFormExcluir($codfilme, $titulo, $descricao, $data_lancamento, $categoria)
  {
?>

  <form id="formExcluir" name="formExcluir" method="post" action="excluifilme.php" onsubmit="return confirm('Você tem certeza que deseja excluir este filme?');">

    <input type="hidden" name="selCod" id="selCod" value="<?php echo $codfilme;?>">
    <p>
    <p>
      <label>Titulo:
      <input class="form-control" type="text" name="titulo" id="titulo" size="30" value="<?php echo $titulo;?>" readonly>
      </label>
    </p>

      <label>Descrição:
      <input class="form-control" type="text" name="descricao" id="descricao" size="30" value="<?php echo $descricao;?>" readonly>

      </label>
    </p>

    <label>Data lançamento:
      <input class="form-control" type="text" name="data_lancamento" id="data_lancamento" size="30" value="<?php echo $data_lancamento;?>" readonly>
    </label>
    </p>

    <label>Categoria:
      <input class="form-control" type="text" name="categoria" id="categoria" size="30" value="<?php echo $categoria;?>" readonly>

      </label>
    </p>
    
    <p>
    
        <?php
         
          include_once("../controller/filmeController.php");
          $obj = new filmeController();
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
  include_once("../controller/filmeController.php");
  $obj = new filmeController();
  $obj->controlaExclusao();

?>
<br>
<br><br>
<a href="listafilme.php">
  <button class="btn btn-primary" type="button">Listar</button>
</a>
<a href="inserefilme.php">
  <button class="btn btn-success" type="button">Cadastrar </button>
</a>
<a href="alterafilme.php">
  <button class="btn btn-warning" type="button">Alterar</button>
</a>
<br><br>
<a href="home.php">
  <button class="btn btn-secondary" type="button">Retornar para a página principal</button>
</a>
</body>
</html>