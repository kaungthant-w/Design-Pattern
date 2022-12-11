<?php

interface CommandExecutor {
    public function runCommand($command);
}

class CommandExecutorImpl implements CommandExecutor {
    public function runCommand($command) {
        echo exec($command);
        echo $command." command executed.";
    }
}

class CommandExecutorProxy implements CommandExecutor {
    private $isAdmin;
    private $executor;
    public function __construct($user, $pwd) {
        if($user == "admin" && $pwd == "admin") {
            $this -> isAdmin = true;
        }

        $this -> executor = new CommandExecutorImpl();
    }

    public function runCommand($command) {
        if($this -> isAdmin) {
            $this -> executor -> runCommand($command);
        } else {

            if(trim(substr($command, 0, 4) == "rm")) {
                echo ("rm command is not allowed for non-admin users.");
                
            } else {
                $this -> executor -> runCommand($command);
            }
        }
    }
}

// client code
$command1 = new CommandExecutorProxy("admin", "admin");
$command1 -> runCommand("notepad.exe");
echo "<br>";
$command2 = new CommandExecutorProxy("user", "user");
$command2 -> runCommand("rm");