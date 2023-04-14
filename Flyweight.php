<?php
class Code {
    public $code;
    public function __construct($code) {
        $this -> code = $code;
    }

    public function getCode() {
        return $this -> code;
    }

    public function setCode($code) {
        $this -> code = $code;
        return $this;
    }
}

interface Platform {
    public function execute(Code $code);
}

class JavaPlatform implements Platform {
    public function __construct() {
        echo "Create Java Platform ";
    }

    public function execute(Code $code) {
        echo "Execute". $code -> getCode()."On Java <br>";
    }
}

class DotNetPlatform implements Platform {
    public function __construct() {
        echo "Create DotNet Platform ";
    }

    public function execute(Code $code) {
        echo "Execute ". $code -> getCode()."On DotNet <br>";
    }
}

class PlatformFactory {
    public $map = [];

    public function getInstance($platformType) {
        if (!isset($this->map[$platformType])) {
            switch ($platformType) {
                case ".Net":
                    $p = new DotNetPlatform();
                    break;
                case "JAVA": 
                    $p = new JavaPlatform(); 
                    break;   
            }
            $this->map[$platformType] = $p;
        }
        return $this->map[$platformType];
    } 
}

// client code 
$javaCode = new Code(" Java program <br>");
$dotNetCode = new Code(" C# Program <br>");

$p = new PlatformFactory();

$dotNet = $p -> getInstance(".Net");
echo $dotNet -> execute($dotNetCode);

$java = $p -> getInstance("JAVA");
echo $java -> execute($javaCode);
