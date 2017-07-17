<?php
  if(isset($_POST['pOrder']) && isset($_POST['pName'])){
    $order = $_POST['pOrder'];
    $name = $_POST['pName'];
    echo($name);
    $file = '../data/orders.json';
    $meats = '../data/items.json';
    

    $totalCost = 0.0;
    $meatCost = json_decode(file_get_contents($meats), true);
    $keys = array_keys($order);

    var_dump($meatCost);
    
    foreach($keys as $key){
      $numberOfOrders = intval($order[$key]);
      $totalCost += (floatval(substr($meatCost[$key],1)) * $numberOfOrders);
    }
    $order["cost"] = $totalCost;
    $order["paid"] = 0; 
    $writeToJson = [];
    $writeToJson[$name] = $order;
    


    $inp = file_get_contents($file);
    $tempArray = json_decode($inp, true);
    
    if(!empty($tempArray)){
      $tempArray = array_merge($tempArray,$writeToJson);
      $jsonData = json_encode($tempArray);
      file_put_contents($file,$jsonData);
    }
    else{
      file_put_contents($file,json_encode($writeToJson), FILE_APPEND);
    }
  }
?>
