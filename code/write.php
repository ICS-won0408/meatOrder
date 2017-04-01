<?php
  if(isset($_POST['pOrder']) && isset($_POST['pName'])){
    $order = $_POST['pOrder'];
    $name = $_POST['pName'];
    echo($name);
    $file = 'orders.json';

    $writeToJson = [];
    $writeToJson[$name] = $order;
    


    $inp = file_get_contents($file);
    $tempArray = json_decode($inp, true);
    
    if(!empty($tempArray)){
      $tempArray = array_merge($tempArray,$writeToJson);
      $jsonData = json_encode($tempArray);
      var_dump($jsonData);
      file_put_contents($file,$jsonData);
    }
    else{
      file_put_contents($file,json_encode($writeToJson), FILE_APPEND);
    }
  }
?>

    
