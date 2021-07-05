<?php
  if(isset($_GET["result"])) {
    $res = htmlspecialchars($_GET["result"]);
    echo "<script>alert(\"$res\");";
    echo "</script>";
  }
  
  if(isset($_GET["error"])) {
    $err = array();
    $err = unserialize($_GET['error']);
    $nome = htmlspecialchars($_GET['nome']);
    $fone = htmlspecialchars($_GET['fone']);
    $str = ":: ";
    
    foreach ($err as $e)
      $str .= $e . " :: ";
    
    echo "<script>alert(\"$str\");";
    echo "document.getElementById('nome').value = \"$nome\";";
    echo "document.getElementById('fone').value = \"$fone\";";
    echo "</script>";
  }
?>