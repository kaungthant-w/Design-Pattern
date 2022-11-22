<?php
interface Publisher {
    public function attach(Subscriber $subscriber);
    public function change($message);
}

interface Subscriber {
    public function update($message);
}

class DataSource implements Publisher  {
    public $subscriberList = [];
    public function attach(Subscriber $subscriber) {
        $this -> subscriberList[] = $subscriber;
    }

    public function change($message) {
        echo "Publisher Change " . $message;
        foreach ($this-> subscriberList as $subscriber) {
            $subscriber -> update($message);
        }
    }

}

class View implements Subscriber {
    protected $viewName;
    public function __construct($viewName) {
        $this -> viewName = $viewName;
    }

    public function update($message) {
        echo "View ".$this->viewName."Update to".$message;
    }
}

function dataSources() {
    $dataSource = new DataSource();
    $view1 = new View("View 1 <br>");
    $view2 = new View("View 2 <br>");
    $view3 = new View("View 3 <br>");

    $dataSource -> attach($view1);
    $dataSource -> attach($view2);
    $dataSource -> attach($view3);

    $dataSource -> change("Change1 <br>");
    $dataSource -> change("Change2 <br>");
}


dataSources();