<?php

class Text
{
    public $displayValue;
    public $font;
    public $color;
    public $decoration;

    public function __construct(Builder $builder)
    {
        $this -> displayValue = $builder -> getDisplayValue();
        $this -> font = $builder -> getFont();
        $this -> color = $builder -> getColor();
        $this -> decoration = $builder -> getDecoration();
    }

    public static function builder()
    {
        return new Builder();
    }
}

class Builder
{
    private $displayValue;
    private $font;
    private $color;
    private $decoration;

    // ***************setter ***********************
    public function displayValue($dValue)
    {
        $this -> displayValue = $dValue;
        return $this;
    }

    public function font($fontName)
    {
        $this -> font = $fontName;
        return $this;
    }

    public function color($color)
    {
        $this -> color = $color;
        return $this;
    }

    public function decoration($decor)
    {
        $this -> decoration = $decor;
        return $this;
    }

     // *************** getter ***********************
    public function getDisplayValue()
    {
        return $this -> displayValue;
    }

    public function getFont()
    {
        return $this -> font;
    }

    public function getColor()
    {
        return $this -> color;
    }

    public function getDecoration()
    {
        return $this -> decoration;
    }

    // build method
    public function build()
    {
        $text = new Text($this);
        return $text;
    }
}

// client code
$text = Text::builder()
        ->displayValue("Hello, World")
        ->color("red")
        ->decoration("bold")
        ->font("20px")
        ->build();
        
var_dump($text);

echo "<br>";
echo "<br>";

echo $text->displayValue;
echo "<br>";

echo $text->color;
echo "<br>";

echo $text->decoration;
echo "<br>";

echo $text->font;
