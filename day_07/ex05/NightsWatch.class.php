<?php
class NightsWatch {
    private $i = 0;
    private $x = 0;
    private $fighters;
	public function fight() {
        foreach($this->fighters as $guard)
        $guard->fight();
	}
	public function recruit($name)   {
            if (is_a($name, 'Ifighter') === true)
            {$this->fighters[$this->i] = $name;
            $this->i++;}
    }
}
?>