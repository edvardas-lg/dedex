<?php

namespace DedexBundle\Entity\Ern43;

/**
 * ERN 4.3 compatibility wrapper for ReferenceTitle.
 * Provides getTitleText() returning an object with value() for compatibility
 * with ERN 382 code that expects ReferenceTitle->getTitleText()->value().
 */
class Ern43CompatReferenceTitle
{
    private $titleText;

    public function __construct($titleText)
    {
        $this->titleText = new Ern43CompatValue($titleText);
    }

    public function getTitleText()
    {
        return $this->titleText;
    }
}
