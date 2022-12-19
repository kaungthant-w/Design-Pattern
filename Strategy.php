<?php

interface SortStrategy {
    public function sort();
}

class Context {
    private $strategy;
    public function getStrategy() {
        return $this -> strategy;
    }

    public function setStrategy (SortStrategy $strategy) {
        $this -> strategy = $strategy;
        return $this;
    }

    public function sort() {
        $this -> strategy -> sort();
    }
}

class MergeSort implements SortStrategy {
    public function sort() {
        echo "Sorting with Merge Sort <br>";
    }
}

class SelectionSort implements SortStrategy {
    public function sort() {
        echo "Sorting with selection sort <br>";
    }
}

$context = new Context();
$context -> setStrategy(new SelectionSort());
$context -> sort();

$context -> setStrategy(new MergeSort());
$context -> sort();