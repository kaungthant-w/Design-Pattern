<?php

class Logger {
    private static $instance = null;
    private function __construct() { // prevent instantiation from other class

    }

    public static function getLogger() {
        if(self::$instance == null) { // check object have alredy constructed
            self::$instance = new Logger(); // instantiate only once
        }

        return self::$instance;
    }

    //other public methods
    public function log ($text) {
        echo "log.$text";
    }
}


$logger1 = Logger::getLogger();
$logger2 = Logger::getLogger();

if ($logger1 == $logger2) {
    echo "True";
} else {
    echo "False";
}
