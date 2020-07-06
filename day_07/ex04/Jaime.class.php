<?php

class Jaime extends Lannister
{
    public function sleepWith($obj)
    {
        if (get_parent_class($obj) === 'Lannister' && get_class($obj) !== 'Cersei'){
            print "Not even if I'm drunk !" . PHP_EOL;
        }
        else if (get_class($obj) === 'Cersei'){
            print "With pleasure, but only in a tower in Winterfell, then." . PHP_EOL;
        }
        else {
            print "Let's do this." . PHP_EOL;
        }
    }
}

?>