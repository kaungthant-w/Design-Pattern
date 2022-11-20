<?php

abstract class UIWidget {
    protected $id;
    public function __construct($id) {
        $this -> id = $id;
    }
    abstract public function paint();
}

class View extends UIWidget {
    public function __construct($id) {
        parent::__construct($id);
    }
    public function paint() {
        echo ("Paint".$this -> id);
    }
}

class ViewGroup extends UIWidget {
    
    public $children = [];

    public function __construct($id) {
        parent::__construct($id);
    }

    public function add(UIWidget $child) {
        $this -> children[] = $child;
    }

    public function paint() {

        foreach( $this->children as $child) {
            $child -> paint();
            echo "<br>";
        }
    }
}


// client code 
$viewGroup = new ViewGroup("viewgroup");
$view1 = new View("view1");
$view2 = new View("view2");

$viewGroup -> add($view1);
$viewGroup -> add($view2);
$viewGroup -> paint();

// $viewGroup2 = new ViewGroup("childGroup");
// $viewGroup2 -> add(new View("Level2Child"));
// $viewGroup2 -> add($viewGroup2);
// $viewGroup2 -> paint();