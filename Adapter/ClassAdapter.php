<?php

interface FrameWork {
    public function add($item);
}

class OldAPI {
    public function addItem($item) {
        echo ("Old API AddItem ".$item);
    }
}

class ClassAdapter extends OldAPI implements FrameWork {
    public function add($item) {
        $this -> addItem($item); // Here call to old API method
    }
}

// client code
function adapter() {
    $framework = new ClassAdapter();
    $framework -> add(30);
}

adapter();