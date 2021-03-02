<?php 
$fruit_array = array(
    'orange',
    'apple',
    'pineapple'
);

if(true) {
    ob_start(); 
    
    foreach($fruit_array as $fruit_key => $fruit_name) {
    ?>
        <h2><?php echo "Key: $fruit_key, Fruit Name: $fruit_name"; ?></h2>
    <?php
    }

    for($i=0; $i<count($fruit_array); $i++) {
        ?>
        <h3><?php echo "Fruit Name: $fruit_array[$i]"; ?></h3>
        <?php
    }
} else {
    ob_start(); ?>
        <h2>This is FALSE</h2>
    <?php
}

if(true) {
    $response = '';
} else {
    $response = '';
}

$response = ob_get_clean();
?>