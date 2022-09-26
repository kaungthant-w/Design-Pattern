<?php

interface Service {
    public function choose();
}

class YellowShirt implements Service {
    public function choose() {
        echo "Buy Yellow T-Shirt";
    }
}

class BlueShirt implements Service {
    public function choose() {
        echo "Buy Blue T-Shirt";
    }
}

class Client {
    protected $clothes;
    public function __construct(Service $clothes)
    {
        $this->clothes = $clothes;
    }

    public function wear() {
        $this->clothes->choose();
    }
}

$service = new Client(new BlueShirt);

$service->wear();

echo "<h1><a href='index.php'>Home</a></h1>";