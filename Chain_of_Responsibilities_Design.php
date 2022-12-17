<?php
class Command {
    public $amount;
    public function __construct($amount) {
        $this -> amount = $amount;
    }
}

abstract class PurcahsePower {
    const BASE = 10;
    protected $successor;

    abstract public function handleRequest(Command $command);

    public function getSuccessor() {
        return $this -> successor;
    }

    public function setSuccessor(PurcahsePower $successor) {
        $this -> successor = $successor;
        return $this;
    }

}

class ManagerPower extends PurcahsePower {
    const ALLOW = PurcahsePower::BASE * 10;

    public function handleRequest(Command $command) {
        if($command -> amount <= ManagerPower::ALLOW) {
            echo "Sale handled by Manager";
        } else {
            if($this -> getSuccessor() != null ) {
                $this -> successor -> handleRequest($command);
            }
        }
    }
    
}

class DirectorPower extends PurcahsePower {
    const ALLOW = PurcahsePower::BASE * 20;

    public function handleRequest(Command $command) {
        if($command -> amount <= DirectorPower::ALLOW) {
            echo "Sale handled by Director";
        } else {
            if($this -> getSuccessor() != null ) {
                $this -> successor -> handleRequest($command);
            }
        }
    }
    
}

class VicePredientPower extends PurcahsePower {
    const ALLOW = PurcahsePower::BASE * 3000;

    public function handleRequest(Command $command) {
        if($command -> amount <= VicePredientPower::ALLOW) {
            echo "Sale handled by VicePredient";
        } else {
            if($this -> getSuccessor() != null ) {
                $this -> successor -> handleRequest($command);
            }
        }
    }
    
}

$manager = new ManagerPower();
$director = new DirectorPower();
$vice = new VicePredientPower();

$manager -> setSuccessor($director);
$director -> setSuccessor($vice);

$command = new Command(10);

$manager -> handleRequest($command);
echo "<br>";
$manager -> handleRequest(new Command(1020));
echo "<br>";
$manager -> handleRequest(new Command(200));
echo "<br>";
$manager -> handleRequest(new Command(600));
echo "<br>";
$manager -> handleRequest(new Command(900));
