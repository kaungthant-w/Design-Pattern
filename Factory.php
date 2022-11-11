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
// you can use interface class in the place of abstract class 
abstract class DataBaseFactory {
    abstract public function getDataBase();
}

// if you used interface class, use "implements" in the place of "extends"
class MYSQLFactory extends DataBaseFactory {
    public function getDataBase() {
        return new MYSQL();
    }
}

// if you used interface class, use "implements" in the place of "extends"
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