<?php 
class Test { 
    public $one;
    public $two;
    public $three = 'three';
    public $four = 'four';

    function __construct($one, $two) {
        $this->one = $one;
        $this->two = $two;
    }

    public function getone() {
        return $this->one;
    }
}

$test = new Test('this', 'that');

echo json_encode($test);
?>