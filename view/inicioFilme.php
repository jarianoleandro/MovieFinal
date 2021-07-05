<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Produtos</title>
<style>
* {
  text-align: center;
}
p {
  font-size: 14px;
  font-weight: bold;
  color: blue;
}
a {
  text-decoration: none;
}
button {
  width: 150px;
  height: 40px;
  margin: 0 15px;
}
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
  <h5 id="idLogin" style="text-align: right"></h5>
  <h3 style="text-align: center">Filmes</h3>
  <p></p>

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
  <a href="excluifilme.php">
    <button class="btn btn-danger" type="button">Excluir </button>
  </a><br><br>

<?php

?>

</body>
</html>
