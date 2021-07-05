<?php
  if(isset($_GET["result"])) {
    $res = htmlspecialchars($_GET["result"]);
    echo "<script>alert(\"$res\");";
    echo "location = \"../index.php\";</script>"; 
  }
  
  if(isset($_GET["error"])) {
    $err = array();
    $err = unserialize($_GET["error"]);
    $strErr = ":: ";
    foreach ($err as $e)
      $strErr .= $e . " :: ";
    echo "<script>alert(\"$strErr\");</script>";
  }
?>