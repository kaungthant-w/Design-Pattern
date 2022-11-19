<?php

interface DrawingAPI {
    public function drawCircle();
    public function drawRectangle();
}

class SVGApi implements DrawingAPI {
    public function drawCircle() {
        echo "Draw SVG Circle.";
    }

    public function drawRectangle() {
        echo "Draw SVG Rectangle.<br>";
    }
}

class CanvasApi implements DrawingAPI {
    public function drawCircle() {
        echo "Draw Canvas Circle.";
    }
    public function drawRectangle() {
        echo "Draw Canvas Rectangle.<br>";
    }
}


abstract class Shape {
    protected $api;
    public function __construct(DrawingAPI $api) {
        $this -> api = $api;
    }

    abstract public function draw();
}

class Circle extends Shape {
    public function __construct(DrawingAPI $api) {
        parent::__construct($api);
    }

    public function draw() {
        $this -> api -> drawCircle();
    }
}

class Rectangle extends Shape {
        public function __construct(DrawingAPI $api) {
            parent::__construct($api);
        }

        public function draw() {
            $this -> api -> drawRectangle();
        }
}


// client code
function bridge() {
    $api1 = new SVGApi();
    $s1 = new Rectangle($api1);
    $s1 -> draw();

    $api2 = new CanvasApi();
    $s2 = new Circle($api2);
    $s2 -> draw();
}

bridge();



