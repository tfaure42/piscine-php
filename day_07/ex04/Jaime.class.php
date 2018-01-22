<?php
class Jaime extends Lannister {
    public function sleepWith($name){
        if (is_a($name, 'Sansa') === true)
        print("Let's do this.". PHP_EOL);
        else if (is_a($name, 'Cersei') === true)
        print("With pleasure, but only in a tower in Winterfell, then.".PHP_EOL);
        else if (is_a($name, 'Lannister') === true)
        print("Not even if I'm drunk !".PHP_EOL);
    }
}
?>