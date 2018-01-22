<?php

require_once 'Vertex.class.php';

class Vector
{
    public static $verbose = FALSE;
    
    private $_x;
    private $_y;
    private $_z;
    private $_w;

    public function __construct($array) {
        if (isset($array['dest']))
        {
            $dest = $array['dest'];

            if (isset($array['orig']) && $array['orig'] instanceof Vertex)
                $orig = $array['orig'];
            else
                $orig = new Vertex(array('x' => 0.0, 'y' => 0.0, 'z' => 0.0));
            
            $this->_x = $dest->getX() - $orig->getX();
            $this->_y = $dest->getY() - $orig->getY();
            $this->_z = $dest->getZ() - $orig->getZ();
            $this->_w = 0;
        }

        if (self::$verbose === TRUE)
            printf("Vector( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f ) constructed.\n", $this->_x, $this->_y, $this->_z, $this->_w);
    }

    public function __destruct() {
        if (self::$verbose === TRUE)
            printf("Vector( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f ) destructed.\n", $this->_x, $this->_y, $this->_z, $this->_w);
    }

    function magnitude() {
        return (sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2)));
    }

    function normalize() {
        $norm = $this->magnitude();
        $new_x = $this->_x / $norm;
        $new_y = $this->_y / $norm;
        $new_z = $this->_z / $norm;

        return (new Vector(array('dest' => new Vertex(array('x' => $new_x, 'y' => $new_y,'z' => $new_z)))));
    }

    public function add($rhs) {
        $new_x = $this->_x + $rhs->getX();
        $new_y = $this->_y + $rhs->getY();
        $new_z = $this->_z + $rhs->getZ();

        return (new Vector(array('dest' => new Vertex(array('x' => $new_x, 'y' => $new_y, 'z' => $new_z)))));
    }
        
    public function sub($rhs) {
        $new_x = $this->_x - $rhs->getX();
        $new_y = $this->_y - $rhs->getY();
        $new_z = $this->_z - $rhs->getZ();

        return (new Vector(array('dest' => new Vertex(array('x' => $new_x, 'y' => $new_y, 'z' => $new_z)))));
    }
        
    public function opposite() {
        return ($this->scalarProduct(-1));
    }
        
    public function scalarProduct($k) {
        $new_x = $this->_x * $k;
        $new_y = $this->_y * $k;
        $new_z = $this->_z * $k;

        return (new Vector(array('dest' => new Vertex(array('x' => $new_x, 'y' => $new_y, 'z' => $new_z)))));
    }
        
    public function dotProduct($rhs) {
        return ($this->_x * $rhs->getX() + $this->_y * $rhs->getY() + $this->_z * $rhs->getZ());
    }
        
    public function cos($rhs) {
        $norm1 = $this->magnitude();
        $norm2 = $rhs->magnitude();

        return ($this->dotProduct($rhs) / ($norm1 * $norm2));
    }
        
    public function crossProduct($rhs) {
        $new_x = $this->_y * $rhs->getZ() - $this->_z * $rhs->getY();
        $new_y = $this->_z * $rhs->getX() - $this->_x * $rhs->getZ();
        $new_z = $this->_x * $rhs->getY() - $this->_y * $rhs->getX();

        return (new Vector(array('dest' => new Vertex(array('x' => $new_x, 'y' => $new_y, 'z' => $new_z)))));
    }

    public function getX() {
        return $this->_x;
    }

    public function getY() {
        return $this->_y;
    }

    public function getZ() {
        return $this->_z;
    }

    public function getW() {
        return $this->_w;
    }

    function __toString() {
        if (self::$verbose === TRUE)
            return (sprintf("Vector( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
    }

    static function doc() {
        if (file_exists('Vector.doc.txt'))
            return file_get_contents('Vector.doc.txt');
    }
}
?>