<?php   

interface Logger {
    public function log($msg);
}

class BasicLogger implements Logger {
    public function log($msg) {
        return $msg;
    }
}

class HTMLDecorator implements Logger {
    protected $logger;
    public function __construct(Logger $logger) {
        $this -> logger = $logger;
    }

    public function log ($msg) {
        return "<html>". $this->logger -> log($msg) ."</html>";
    }
}

class TimeDecorator implements Logger {
    protected $logger;
    public function __construct(Logger $logger) {
        $this -> logger = $logger;
    }

    public function log($msg)
    {
        return date("m-d-Y")." ".$this->logger->log($msg) ;
    }
}


// Client Code
function deco() {
    $lg = new HTMLDecorator(new TimeDecorator(new BasicLogger()));
    $msg =  $lg->log("LogString");
    echo $msg;

    echo "<br>";

    $lg2 = new HTMLDecorator(new BasicLogger());
    $msg2 = $lg2 -> log("LogString2");
    echo $msg2;
}

deco();