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
<h3>Lista de Usuario</h3>
<br>
<table class="table">
  <thead>
    <tr>
      <th>Código</th>
      <th>CPF</th>
      <th>Usuario</th>
    </tr> 
  </thead>
  <tbody>
  <?php
 
    include_once("../controller/usuarioController.php");
    $obj = new usuarioController();
    $obj->controlaConsulta(1);

  ?>
  </tbody>
</table>
<br>
<br><br>
<a href="insereUsuario.php">
  <button class="btn btn-success" type="button">Cadastrar </button>
</a>
<a href="alteraUsuario.php">
  <button class="btn btn-warning" type="button">Alterar</button>
</a>
<a href="excluiUsuario.php">
  <button class="btn btn-danger" type="button">Excluir </button>
</a><br><br>
<a href="home.php">
  <button class="btn btn-secondary" type="button">Retornar para a página principal</button>
</a>

</body>
</html>