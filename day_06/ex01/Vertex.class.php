<?php

require_once 'Color.class.php';

class Vertex
{
    public static $verbose = FALSE;

    private $_x;
    private $_y;
    private $_z;
    private $_w = 1;
    private $_color;

    public function __construct($array) {
        $this->_x = $array['x'];
        $this->_y = $array['y'];
        $this->_z = $array['z'];

        if (isset($array['w']))
            $this->_w = $array['w'];

        if (isset($array['color']) && $array['color'] instanceof Color)
            $this->_color = $array['color'];
        else
            $this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
        
        if (self::$verbose === TRUE)
            printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, %s ) constructed.\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
    }

    public function __destruct() {
        if (self::$verbose === TRUE)
            printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, %s ) destructed.\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
    }

    public function getX() {
        return $this->_x;
    }
    public function setX($x) {
        $this->_x = $x;
    }

    public function getY() {
        return $this->_y;
    }
    public function setY($y) {
        $this->_y = $y;
    }

    public function getZ() {
        return $this->_z;
    }
    public function setZ($z) {
        $this->_z = $z;
    }

    public function getW() {
        return $this->_w;
    }
    public function setW($w) {
        $this->_w = $w;
    }

    public function getColor() {
        return $this->_color;
    }
    public function setColor($color) {
        $this->_color = $color;
    }

    function __toString() {
        if (self::$verbose === TRUE)
            return (sprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, %s )", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color));
        else
            return (sprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
    }

    static function doc() {
        if (file_exists('Vertex.doc.txt'))
            return file_get_contents('Vertex.doc.txt');
    }
}
?>