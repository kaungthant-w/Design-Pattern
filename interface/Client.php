<?php

include "BlueShirt.php";
include "YellowShirt.php";

class Client {
    protected $clothes;
    public function __construct(BlueShirt $clothes)
    {
        $this->clothes = $clothes;
    }

    public function wear() {
        $this->clothes->choose();
    }
}

$blueShirt = new Client(new BlueShirt);

$blueShirt->wear();

echo "<h1><a href='index.php'>Home</a></h1>";