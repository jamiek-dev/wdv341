<?php
// $date = date('Y/m/d H:i:s');
// $timestamp = strtotime($date);

// $new_date = date('m/d/Y', $timestamp);
// echo $new_date;
?>

<?php
static $x = 0;

function testing() {
    global $x;
    $x++;
}

testing();
testing();

echo $x;
?>