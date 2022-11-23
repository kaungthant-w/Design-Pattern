<?php
class CPU {
    public function freeze() {
        echo "CPU freeze✅<br>";
    }
 
    public function jump() {
        echo "Jump to instruction✅<br>";
    }

    public function execute() {
        echo "execute✅<br>";
    }
}

class Memory {
    public function load() {
        echo "Load Ram✅<br>";
    }
}

class HardDsik {
    public function readBootSector() {
        echo "Read Bootsector✅<br>";
    }
}

class Facade {
    private $cpu;
    private $memory;
    private $hardDisk; 

   public function __construct() {
        $this -> cpu = new CPU();
        $this -> memory = new Memory();
        $this -> hardDisk = new HardDsik();
   }

   public function start() {
     $this->hardDisk -> readBootSector();
     $this->memory -> load();
     $this->cpu -> jump();
     $this->cpu -> execute();
   }
}

//client code
function demo() {
    $demo = new Facade();
    $demo -> start();
}

demo();