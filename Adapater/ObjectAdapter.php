<?php

interface FrameWork {
    public function add($item);
}

class OldAPI {
    public function addItem($item) {
        echo ("Old API AddItem ".$item);
    }
}

class ObjectAdapter implements FrameWork {

    // here is object composition
    public $oldAPI;
    public function __construct() {
        $this -> oldAPI = new OldAPI;
    }

    public function add($item) {
        $this -> oldAPI -> addItem($item);// here call to old api method
    }
}


// client code
function adapter() {
    $framework = new ObjectAdapter();
    $framework -> add(30);
}

adapter();
