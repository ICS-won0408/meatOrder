<?php
  if(isset($_POST['pName']) && isset($_POST['pOrder'])){
    $name = $_POST['pName'];
    $order = $_POST['pOrder'];
    $writeToJson = array($name => $order);
    $fp = fopen('orders.json','w');
    fwrite($fp, json_encode($writeToJson));
    fclose($fp);
  }
?>

    
