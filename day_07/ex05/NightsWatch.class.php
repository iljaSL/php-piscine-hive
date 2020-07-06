<?php

Class NightsWatch
{
    private $members = array();

    public function recruit($newMember)
    {
        if (is_subclass_of($newMember, 'IFighter'))
        {
            $this->members[] = $newMember;
        }
    }
    public function fight()
    {
        foreach ($this->members as $person)
        {
            $person->fight();
        }
    }
}

?>