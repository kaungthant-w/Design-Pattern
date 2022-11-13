<?php

use DataBaseFactory as GlobalDataBaseFactory;

abstract class Database {
    abstract public function connect();
}

class MYSQL extends Database {
    public function connect() {
        echo "Connect to MYSQL";
    }
}

class Oracle extends Database {
    public function connect() {
         echo "Connect to Oracle";
    }
}

// factory
class DatabaseFactory {
    public static function get($database) {
        switch ($database) {
            case "MYSQL": return new $database;break;
            case "Oracle": return new $database;break;
            default: throw new Exception("{$database} does not exists");break;
        }
    }
}

try{
    //client code
    $data = DatabaseFactory::get("MYSQL");
    $data->connect();

    echo "<br>";

    $data = DatabaseFactory::get("Oracle");
    $data->connect();

    echo "<br>";

    $data = DatabaseFactory::get("MSSQL");
    $data->connect();
} catch(Exception $e) {
    echo $e->getMessage();
}

