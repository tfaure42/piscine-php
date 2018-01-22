<?php
class UnholyFactory {
    private $type;

	public function absorb($class) {
    if (is_a($class, 'Fighter') === true)
    {
        if ($this->type)
        foreach ($this->type as $t)
        {
            if ($class == $t)
            {
                print("(Factory already absorbed a fighter of type ".$class.")".PHP_EOL);
                return;
            }
        }
        $this->type[] = $class;
        print("(Factory absorbed a fighter of type ".$class.")".PHP_EOL);
        return;
    }
    else 
        print("(Factory can't absorb this, it's not a fighter)".PHP_EOL);
    }
    public function fabricate($class) {
        foreach ($this->type as $t)
        {
            if ($class == $t)
            {
                print("(Factory fabricates a fighter of type ".$class.")".PHP_EOL);
                return($t);
            }
        }
        print("(Factory hasn't absorbed any fighter of type ".$class.")".PHP_EOL);
        return;
    }
}
?>