<?php
    if(isset($_POST['names'])){
        $names = $_POST['names'];
        $file = '../data/orders.json';

        $inp = file_get_contents($file);
        $tempArray = json_decode($inp, true);

        var_dump($tempArray);
        foreach($names as $value){
            if(isset($tempArray[$value]["paid"])){
                $tempArray[$value]["paid"] = "1";
            }
        }
        var_dump($tempArray);
        
        file_put_contents($file, json_encode($tempArray));
    }