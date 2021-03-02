<?php 
$array = array(
    'PHP',
    'HTML',
    'JavaScript'
);
?>
<script>
let array = [];
let currentItem;

<?php foreach($array as $item) {
    ?>
    currentItem = '<?=$item?>'
    array.push(currentItem);
    <?php
} ?>

for(let i=0; i<array.length; i++) {
    document.writeln(array[i]);
}
// document.writeln(array);
</script>