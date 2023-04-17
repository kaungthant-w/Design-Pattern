<?php

interface Command {
    public function execute();
}

class CopyCommand implements Command {
   public function execute() {
        echo "Copy Executed <br>";
   } 
}

class EditCommand implements Command {
    public function execute() {
        echo "Edit Executed <br>";
    }
}

class Paste implements Command {
    public function execute() {
        echo "Paste";
    }
}

class Invoker {
    public $history = [];
    public function invoke( Command $command) {
        array_push($this -> history, $command);
        $command -> execute();
    }

    public function undo() {
        array_pop($this->history);
        echo "Undo <br>";
    }
}

$invoker = new Invoker();
$copy = new CopyCommand();
$invoker -> invoke($copy);

$paste = new Paste();
$invoker -> invoke($paste);

$invoker -> undo();
$invoker -> undo();

// $edit = new EditCommand();
// $invoker -> invoke($edit);

// echo "<pre>";
// var_dump($invoker -> history);

// $invoker -> undo();
// $invoker -> undo();
// echo "<pre>";
// var_dump($invoker -> history);

// $invoker -> invoke($copy);

// $copy -> execute();

// echo "<pre>";
// var_dump($invoker -> history);
