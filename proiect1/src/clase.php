<?php
class Flower {
    public $name;
    public $color;

    public function __construct($name, $color) {
        $this->name = $name;
        $this->color = $color;
    }

    public function displayInfo() {
        echo "Name: " . $this->name . ", Color: " . $this->color;
    }

    public function bloom() {
        echo $this->name . " is blooming beautifully!";
    }
}

class Bouquet {
    public $flowers = [];

    public function addFlower($flower) {
        $this->flowers[] = $flower;
    }

    public function displayBouquet() {
        echo "Bouquet Contents:\n";
        foreach ($this->flowers as $flower) {
            echo $flower->displayInfo() . "\n";
        }
    }
}

// Example usage:
$rose = new Flower("Rose", "Red");
$lily = new Flower("Lily", "White");

$bouquet = new Bouquet();
$bouquet->addFlower($rose);
$bouquet->addFlower($lily);

$bouquet->displayBouquet();