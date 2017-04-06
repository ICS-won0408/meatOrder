<?php
    if(isset($_POST['names'])||isset($_POST['delete'])){
        $names = $_POST['names'];
        $deleteNames = $_POST['delete'];
        $file = '../data/orders.json';

        $inp = file_get_contents($file);
        $tempArray = json_decode($inp, true);

        var_dump($tempArray);
        foreach($names as $value){
            if(isset($tempArray[$value]["paid"])){
                $tempArray[$value]["paid"] = "1";
            }
        }
        foreach($deleteNames as $value){
            if(isset($tempArray[$value])){
                unset($tempArray[$value]);
            }
        }
        var_dump($tempArray);
        if(empty($tempArray)){
            unlink($file);
        }
        else{
        file_put_contents($file, json_encode($tempArray));
        }
    }