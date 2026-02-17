<?php

namespace DedexBundle\Entity\Ern43;

/**
 * ERN 4.3 compatibility wrapper for ResourceGroup nesting.
 * ERN 382 uses two-level nesting: outer group → CD groups → tracks.
 * ERN 4.3 uses varying structures:
 *   - Flat: single group → tracks (e.g., DjMix, SingleResourceRelease)
 *   - Already nested: group → sub-groups (Components) → tracks (e.g., Bundle)
 * This wrapper normalizes both into the 2-level structure the Simplifier expects.
 */
class Ern43CompatResourceGroupWrapper
{
    private $innerGroup;

    public function __construct($innerGroup)
    {
        $this->innerGroup = $innerGroup;
    }

    /**
     * Returns the CD-level sub-groups.
     * If the inner group already has sub-groups (nested case like Bundle),
     * return them directly. Otherwise, wrap the inner group itself as a
     * single CD-level group.
     */
    public function getResourceGroup()
    {
        if ($this->innerGroup === null) {
            return [];
        }

        $subGroups = $this->innerGroup->getResourceGroup();
        if (!empty($subGroups)) {
            return $subGroups;
        }

        return [$this->innerGroup];
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
