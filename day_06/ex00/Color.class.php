<?php
    class Color
    {
        public static $verbose = FALSE;

        public $red;
        public $green;
        public $blue;

        public function __construct($array) {
            if (isset($array['red']) && isset($array['green']) && isset($array['blue']))
            {
                $this->red = $array['red'];
                $this->green = $array['green'];
                $this->blue = $array['blue'];
            }
            else if (isset($array['rgb']))
            {
                $rgb = intval($array['rgb']);

                $this->red = ($rgb / 65281) % 256;
                $this->green = ($rgb / 256) % 256;
                $this->blue = $rgb % 256;
            }

            if (self::$verbose === TRUE)
                printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->red, $this->green, $this->blue);
        }

        public function __destruct() {
            if (self::$verbose === TRUE)
                printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", $this->red, $this->green, $this->blue);
        }

        public function add($color) {
            return (new Color(array('red' => ($this->red + $color->red), 'green' => ($this->green + $color->green), 'blue' => ($this->blue + $color->blue))));
        }

        public function sub($color) {
            return (new Color(array('red' => ($this->red - $color->red), 'green' => ($this->green - $color->green), 'blue' => ($this->blue - $color->blue))));
        }

        public function mult($f) {
            return (new Color(array('red' => ($this->red * $f), 'green' => ($this->green * $f), 'blue' => ($this->blue * $f))));
        }

        function __toString() {
            return (sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue));
        }

        static function doc() {
            if (file_exists('Color.doc.txt'))
                return file_get_contents('Color.doc.txt');
        }
    }
?>