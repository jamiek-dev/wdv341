<?php
// Class name should start with capitol letter
class Penguin {
    // Access modifier sets access level
    public $name;
    private $fanciness;

    // Constructor is run every time an instance of this object is created
    function __construct($name, $fanciness = 0) {
        // $this refers to the current instance
        $this->name = $name; 
        $this->set_fanciness($fanciness);
    }

    public function set_fanciness($fancy) {
        $this->fanciness = $this->calculate_fanciness($fancy);
    }

    public function get_fanciness() {
        return $this->fanciness;
    }

    /**
     * Properly format fanciness
     */
    private function calculate_fanciness($fanciness) {
        $how_fancy = "$this->name ";

        if($fanciness <= 3) {
            $how_fancy .= 'is not so fancy.';
        } elseif($fanciness <= 7) {
            $how_fancy .= 'is fancy.';
        } else {
            $how_fancy .= 'is super fancy.';
        }

        return $how_fancy;
    }
}

$daryl = new Penguin('Daryl', 5);
$barbra = new Penguin('Barb');
$barbra->set_fanciness(10);
echo '<pre>'; print_r($daryl->get_fanciness()); echo '</pre>';
echo '<pre>'; print_r($barbra->get_fanciness()); echo '</pre>';
?>