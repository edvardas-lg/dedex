<?php

namespace DedexBundle\Entity\Ern43;

/**
 * ERN 4.3 compatibility wrapper for ResourceGroup nesting.
 * ERN 382 uses two-level nesting: outer group → CD groups → tracks.
 * ERN 4.3 uses flat structure: single group → tracks.
 * This wrapper provides the outer group level, containing the actual
 * ResourceGroup as a sub-group.
 */
class Ern43CompatResourceGroupWrapper
{
    private $innerGroup;

    public function __construct($innerGroup)
    {
        $this->innerGroup = $innerGroup;
    }

    /**
     * Returns the actual ResourceGroup as a sub-group (CD level).
     */
    public function getResourceGroup()
    {
        return $this->innerGroup !== null ? [$this->innerGroup] : [];
    }

    /**
     * Returns content items at the outer level.
     * In ERN 4.3, linked resources (images) are referenced via
     * LinkedReleaseResourceReference at the ResourceGroup level.
     */
    public function getResourceGroupContentItem()
    {
        if ($this->innerGroup === null) {
            return [];
        }
        $items = [];
        foreach ($this->innerGroup->getLinkedReleaseResourceReference() as $ref) {
            $refValue = is_object($ref) && method_exists($ref, 'value') ? $ref->value() : (string) $ref;
            $items[] = new Ern43CompatLinkedResourceItem($refValue);
        }
        return $items;
    }

    public function getSequenceNumber()
    {
        return null;
    }
}
