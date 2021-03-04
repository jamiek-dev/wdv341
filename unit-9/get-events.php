<?php 
require_once('event.php');

function verify_array($needle, $haystack) {
    if(is_array($haystack) && array_key_exists($needle, $haystack)) {
        return $haystack[$needle];
    }

    return false;
}

$presenter1 = verify_array('presenter1', $_GET);
$presenter2 = verify_array('presenter2', $_GET);
$product_obj = new Event();

if($presenter1 || $presenter2) {
    $values = array();
    $query = "SELECT name ";
    $query .= "FROM wdv341_events ";
    $query .= "WHERE presenter IN(";

    if($presenter1) {
        $query .= ':presenter1';
        $values[] = array(':presenter1', $presenter1);
    }

    if($presenter2) {
        $query .= $presenter1
            ? ', :presenter2'
            : ':presenter2';
        $values[] = array(':presenter2', $presenter2);
    }

    $query .= ')';

    $products = $product_obj->get_events($query, $values);
} else {
    $query = "SELECT name FROM wdv341_events";
    $products = $product_obj->get_events($query);
}

echo json_encode($products);
?>