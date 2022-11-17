<?php
interface Prototype {
     public function __clone();
}

class HeavyObject implements Prototype {
    protected $propertyFromDB;
    protected $computationalHungryProperty;

    public function getPropertyFromDB() {
        // return "propertyFromDB" ; // Here assume call to do to simulate costly memory
        return $this->propertyFromDB; // if you don't use this, add static keyword from getPropertyFromDB method
    }

    public function getComputationalHungryProperty() {
        // return "ComputationalHungryProperty"; // Here assume call to costly computation time
        return $this->computationalHungryProperty; // if you don't use this, add static keyword from getComputationalHungryProperty method
    }


    public function __construct() {
        $this -> propertyFromDB = "propertyFromDB";
        $this -> computationalHungryProperty = "computationalHungryProperty";
    }

    public function __clone() {

    }

}

// client code
$firstObj = new HeavyObject();
$another = clone $firstObj;

if($firstObj == $another) {
    echo "Have been cloned.<br>";
} else {
    echo "Have not been cloned.";
}

// echo $firstObj -> getPropertyFromDB()."=> firstObj <br>";
// echo $firstObj -> getComputationalHungryProperty()."=> firstObj <br><br>";
// echo $another -> getPropertyFromDB()."=> another <br>";
// echo $another -> getComputationalHungryProperty()."=> another <br>";
