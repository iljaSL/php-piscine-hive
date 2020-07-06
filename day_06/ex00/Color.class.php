<?php

class Color
{
    public static $verbose = false;
    public static function doc()
    {
        return file_get_contents('Color.doc.txt');
    }

    public $red;
    public $green;
    public $blue;

    public function __construct($array)
    {
        if (isset($array['rgb'])) {
            $rgb = intval($array['rgb']);
            $this->red = ($rgb >> (8 * 2)) & 0xff;
            $this->green = ($rgb >> 8) & 0xff;
            $this->blue = $rgb & 0xff;
        } else
        {
            $this->red = intval($array['red']);
            $this->green = intval($array['green']);
            $this->blue = intval($array['blue']);
        }
        if (SELF::$verbose)
        {
            echo $this->__toString() . 'constructed.' . PHP_EOL;
        }
    }

    public function __destruct()
    {
        if (SELF::$verbose)
        {
            echo $this->__toString() . 'destructed.' . PHP_EOL;
        }
    }

    public function __toString()
    {
        return sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
    }

    public function add($clr)
    {
        $r = $this->red + $clr->red;
        $g = $this->green + $clr->green;
        $b = $this->blue + $clr->blue;
        return new Color( array('red' => $r, 'green' => $g, 'blue' => $b) );
    }

    public function sub($clr)
    {
        $r = $this->red - $clr->red;
        $g = $this->green - $clr->green;
        $b = $this->blue - $clr->blue;
        return new Color( array('red' => $r, 'green' => $g, 'blue' => $b) );
    }

    public function mult($clr)
    {
        $r = $this->red * $clr;
        $g = $this->green * $clr;
        $b = $this->blue * $clr;
        return new Color( array('red' => $r, 'green' => $g, 'blue' => $b) );
    }
}

?>