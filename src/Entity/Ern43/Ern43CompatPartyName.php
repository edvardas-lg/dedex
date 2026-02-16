<?php

namespace DedexBundle\Entity\Ern43;

/**
 * ERN 4.3 compatibility wrapper for party name.
 * Provides getFullName() for compatibility with ERN 382 code that expects
 * PartyName objects with getFullName().
 */
class Ern43CompatPartyName
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getFullName()
    {
        return $this->name;
    }
}
