<?php


namespace App\ValueObjects;


class ValueObject
{
    public function __construct(array $properties = [])
    {
        $this->fillProperties($properties);

    }

    public function fillProperties(array $properties)
    {
        foreach($properties as $key => $value)
        {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }
}
