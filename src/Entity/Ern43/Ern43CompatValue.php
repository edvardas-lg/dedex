<?php

namespace DedexBundle\Entity\Ern43;

/**
 * ERN 4.3 compatibility value wrapper.
 * Provides value(), getUserDefinedValue(), getReleaseResourceType() for
 * compatibility with ERN 382 code that expects value objects.
 */
class Ern43CompatValue
{
    private $val;
    private $userDefined;
    private $releaseResourceType;

    public function __construct($val, $userDefined = null, $releaseResourceType = null)
    {
        $this->val = $val;
        $this->userDefined = $userDefined;
        $this->releaseResourceType = $releaseResourceType;
    }

    public function value()
    {
        return $this->val;
    }

    public function getUserDefinedValue()
    {
        return $this->userDefined;
    }

    public function getReleaseResourceType()
    {
        return $this->releaseResourceType;
    }

    public function __toString()
    {
        return (string) $this->val;
    }
}
