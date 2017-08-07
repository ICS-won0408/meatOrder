<?php
/**
 * Created by IntelliJ IDEA.
 * User: Jonathan
 * Date: 8/7/2017
 * Time: 5:02 PM
 */
if(isset($_POST['meat'], $_POST['cost'])) {
    $file = '../data/items.json';
    $inp = file_get_contents($file);
    $tempArray = json_decode($inp, true);

    $meat = $_POST['meat'];
    $meatCost = $_POST['cost'];

    $tempArray[$meat] = '$'.$meatCost;
    file_put_contents($file, json_encode($tempArray));

}
