<?php
interface DataBase {
    public function connect($message);
}

class MYSQL implements DataBase {
    public function connect($message) {
        echo "Connecting to $message";
    }
}

class Oracle implements DataBase {
    public function connect($message) {
        echo "Connecting to $message";
    }
}

// Here start Factory Classes
abstract class DataBaseFactory {
    abstract public function getDataBase();
}

class MYSQLFactory extends DataBaseFactory {
    public function getDataBase() {
        return new MYSQL();
    }
}

class OracleFactory extends DataBaseFactory {
    public function getDataBase() {
        return new Oracle();
    }
}

// client code
$database = new MYSQLFactory();
$database->getDataBase()->connect("MYSQL");

echo "<br>";

$database = new OracleFactory();
$database->getDataBase()->connect("Oracle");