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

class Invoker {
    public $history = [];
    public function invoke( Command $command) {
        array_push($this -> history, $command);
        $command -> execute();
    }

    public function undo() {
        array_splice($this -> history, 1,1);
        echo "Undo <br>";
        // $command -> execute();
    }
}

$invoker = new Invoker();
$copy = new CopyCommand();
$invoker -> invoke($copy);

$edit = new EditCommand();
$invoker -> invoke($edit);

echo "<pre>";
var_dump($invoker -> history);

$invoker -> undo();
$invoker -> undo();
echo "<pre>";
var_dump($invoker -> history);

$invoker -> invoke($copy);

$copy -> execute();

echo "<pre>";
var_dump($invoker -> history);
