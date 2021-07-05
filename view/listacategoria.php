<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Consultar</title>
<style>
h3 {
  padding-left: 10px;
}
th {
  padding-left: 10px;
}
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
<h3>Lista de Categorias</h3>
<br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Categoria</th>
      <th scope="col">Descrição</th>
    </tr>
  </thead>
  <tbody>
  <?php
  
    include_once("../controller/categoriaController.php");
    $obj = new categoriaController();
    $obj->controlaConsulta(1);

  ?>
  </tbody>
</table>
<br>
<br><br>
<a href="inserecategoria.php">
  <button class="btn btn-success" type="button">Cadastrar</button>
</a>
<a href="alteracategoria.php">
  <button class="btn btn-warning" type="button">Alterar</button>
</a>
<a href="excluicategoria.php">
  <button class="btn btn-danger" type="button">Excluir </button>
</a><br><br>
<a href="home.php">
  <button class="btn btn-secondary" type="button">Retornar para a página principal</button>
</a>

</body>
</html>