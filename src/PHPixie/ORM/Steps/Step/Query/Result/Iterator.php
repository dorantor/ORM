<?php

namespace PHPixie\ORM\Steps\Step\Query\Result;

class SingleUse extends \PHPixie\ORM\Steps\Step\Query\Result
{
    public function getIterator()
    {
        return $this->result();
    }
    
    public function asArray()
    {
        return iterator_to_array($this->result);
    }
}