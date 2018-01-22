<?php
class Fighter {
    private $name;

    public function __construct($type)  {
        $this->name = $type;
    }
    public function __tostring()    {
        return($this->name);
    }
}
?>