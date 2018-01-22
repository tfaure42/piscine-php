<?php

require_once 'Vertex.class.php';

class Matrix
{
    public static $verbose = FALSE;

    const IDENTITY = 'IDENTITY';
    const SCALE = 'SCALE';
    const RX = 'Ox ROTATION';
    const RY = 'Oy ROTATION';
    const RZ = 'Oz ROTATION';
    const TRANSLATION = 'TRANSLATION';
    const PROJECTION = 'PROJECTION';
    
    const NONE = 'NONE';

    protected $_matrix = [[0,0,0,0],
                        [0,0,0,0],
                        [0,0,0,0],
                        [0,0,0,0]];

    private $_scale;
    private $_angle;
    private $_vtc;
    private $_fov;
    private $_ratio;
    private $_near;
    private $_far;

    public function __construct($array) {
        if (isset($array['preset']))
        {
            $preset = $array['preset'];

            switch ($preset)
            {
                case self::IDENTITY:
                    $this->_identity();
                    break;

                case self::SCALE:
                    $this->_scale = $array['scale'];

                    $this->_scale();
                    break;

                case self::RX:
                    $this->_angle = $array['angle'];
                
                    $this->_rotation('x');
                    break;

                case self::RY:
                    $this->_angle = $array['angle'];
                
                    $this->_rotation('y');
                    break;

                case self::RZ:
                    $this->_angle = $array['angle'];

                    $this->_rotation('z');
                    break;

                case self::TRANSLATION:
                    $this->_vtc = $array['vtc'];

                    $this->_translation();
                    break;

                case self::PROJECTION:
                    $this->_fov = $array['fov'];
                    $this->_ratio = $array['ratio'];
                    $this->_near = $array['near'];
                    $this->_far = $array['far'];

                    $this->_projection();
                    break;

                default:
                    break;
            }

            if (self::$verbose === TRUE && $preset === self::IDENTITY)
                printf("Matrix %s instance constructed.\n", $preset);
            elseif (self::$verbose === TRUE)
                printf("Matrix %s preset instance constructed.\n", $preset);
        }
    }

    private function _identity() {
        $this->_matrix[0][0] = 1;
        $this->_matrix[1][1] = 1;
        $this->_matrix[2][2] = 1;
        $this->_matrix[3][3] = 1;
    }

    private function _scale() {
        $this->_matrix[0][0] = $this->_scale;
        $this->_matrix[1][1] = $this->_scale;
        $this->_matrix[2][2] = $this->_scale;
        $this->_matrix[3][3] = 1;
    }

    private function _rotation($axis) {
        switch ($axis)
        {
            case 'x':
                $this->_matrix[0][0] = 1;
                $this->_matrix[1][1] = cos($this->_angle);
                $this->_matrix[1][2] = -sin($this->_angle);
                $this->_matrix[2][1] = sin($this->_angle);                
                $this->_matrix[2][2] = cos($this->_angle);
                break;
            
            case 'y':
                $this->_matrix[1][1] = 1;
                $this->_matrix[0][0] = cos($this->_angle);
                $this->_matrix[0][2] = sin($this->_angle);
                $this->_matrix[2][0] = -sin($this->_angle);
                $this->_matrix[2][2] = cos($this->_angle);
                break;

            case 'z':
                $this->_matrix[2][2] = 1;
                $this->_matrix[0][0] = cos($this->_angle);
                $this->_matrix[0][1] = -sin($this->_angle);
                $this->_matrix[1][0] = sin($this->_angle);                
                $this->_matrix[1][1] = cos($this->_angle);
                break;

            default:
                break;
        }
        $this->_matrix[3][3] = 1;
    }

    private function _translation() {
        $this->_identity();

        $this->_matrix[0][3] = $this->_vtc->getX();
        $this->_matrix[1][3] = $this->_vtc->getY();
        $this->_matrix[2][3] = $this->_vtc->getZ();
    }
    
    private function _projection() {
        $this->_identity();
    
        $this->_matrix[1][1] = 1 / tan(0.5 * deg2rad($this->_fov));
        $this->_matrix[0][0] = $this->_matrix[1][1] / $this->_ratio;
        $this->_matrix[2][2] = -1 * (-$this->_near - $this->_far) / ($this->_near - $this->_far);
        $this->_matrix[2][3] = (2 * $this->_near * $this->_far) / ($this->_near - $this->_far);        
        $this->_matrix[3][2] = -1;
        $this->_matrix[3][3] = 0;
    }

    public function __destruct() {
        if (self::$verbose === TRUE)
            printf("Matrix instance destructed.\n");
    }


    public function mult($rhs) {
        $tmp = [[0, 0, 0, 0],
                [0, 0, 0, 0],
                [0, 0, 0, 0],
                [0, 0, 0, 0]];
        
        for ($i = 0; $i < 4; $i++)
        {
            for ($j = 0; $j < 4; $j++)
            {
                for ($k = 0; $k < 4; $k++)
                {
                    $tmp[$i][$k] += $this->_matrix[$i][$j] * $rhs->_matrix[$j][$k];
                }
            }
        }

        $new_matrix = new Matrix(NULL);
        $new_matrix->_matrix = $tmp;

        return ($new_matrix);
    }

    public function transformVertex($vtx) {
        $new_x = $this->_matrix[0][0] * $vtx->getX() + $this->_matrix[0][1] * $vtx->getY() + $this->_matrix[0][2] * $vtx->getZ() + $this->_matrix[0][3] * $vtx->getW();
        $new_y = $this->_matrix[1][0] * $vtx->getX() + $this->_matrix[1][1] * $vtx->getY() + $this->_matrix[1][2] * $vtx->getZ() + $this->_matrix[1][3] * $vtx->getW();
        $new_z = $this->_matrix[2][0] * $vtx->getX() + $this->_matrix[2][1] * $vtx->getY() + $this->_matrix[2][2] * $vtx->getZ() + $this->_matrix[2][3] * $vtx->getW();
        $new_w = $this->_matrix[3][0] * $vtx->getX() + $this->_matrix[3][1] * $vtx->getY() + $this->_matrix[3][2] * $vtx->getZ() + $this->_matrix[3][3] * $vtx->getW();

        return (new Vertex(array('x' => $new_x, 'y' => $new_y, 'z' => $new_z, 'w' => $new_w)));
    } 

    function __toString() {
        $str = "";

        $str .= "M | vtcX | vtcY | vtcZ | vtxO\n";
        $str .= "-----------------------------\n";
        $str .= "x | %0.2f | %0.2f | %0.2f | %0.2f\n";
        $str .= "y | %0.2f | %0.2f | %0.2f | %0.2f\n";
        $str .= "z | %0.2f | %0.2f | %0.2f | %0.2f\n";
        $str .= "w | %0.2f | %0.2f | %0.2f | %0.2f";

        return (sprintf($str, $this->_matrix[0][0], $this->_matrix[0][1], $this->_matrix[0][2], $this->_matrix[0][3],
                              $this->_matrix[1][0], $this->_matrix[1][1], $this->_matrix[1][2], $this->_matrix[1][3],
                              $this->_matrix[2][0], $this->_matrix[2][1], $this->_matrix[2][2], $this->_matrix[2][3],
                              $this->_matrix[3][0], $this->_matrix[3][1], $this->_matrix[3][2], $this->_matrix[3][3]));
    }

    static function doc() {
        if (file_exists('Matrix.doc.txt'))
            return file_get_contents('Matrix.doc.txt');
    }
}
?>