<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Consultar</title>
<style>
table, td, th {
  
  padding: 20px;
  border: 1px solid black;
  height: auto;
  width: 200px;
}

th {
  font-weight: bold;
 
}

table {
  border-collapse: collapse;
  
}
a {
  text-decoration: none;
  
}
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
<h3>Lista de Filme</h3>
<br>
<table class="table">
  <tr>
    <th scope="col">Titulo</th>
    <th scope="col">Descrição</th>
    <th scope="col">Data de lançamento</th>
    <th scope="col" >Categoria</th>
    <th scope="col">Produtos</th>
  </tr>

  <?php
 
    include_once("../controller/filmeController.php");
    $obj = new filmeController();
    $obj->controlaConsulta(1);

  ?>

</table>

<br>
<br><br>
<a href="inserefilme.php">
  <button class="btn btn-success" type="button">Cadastrar </button>
</a>
<a href="alterafilme.php">
  <button class="btn btn-warning" type="button">Alterar</button>
</a>
<a href="excluifilme.php">
  <button class="btn btn-danger" type="button">Excluir </button>
</a><br><br>
<a href="home.php">
  <button class="btn btn-secondary" type="button">Retornar para a página principal</button>
</a>

</body>
</html>