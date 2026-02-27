<?php

namespace DedexBundle\Entity\Ern43;

/**
 * ERN 4.3 compatibility wrapper for ResourceGroup nesting.
 * ERN 382 uses two-level nesting: outer group → CD groups → tracks.
 * ERN 4.3 uses varying structures:
 *   - Flat: single group → tracks (e.g., DjMix, SingleResourceRelease)
 *   - Already nested: group → sub-groups (Components) → tracks (e.g., Bundle)
 * This wrapper normalizes both into the 2-level structure the Simplifier expects.
 *
 * When used as a CD-level group (flat case), it filters out non-SoundRecording
 * content items (e.g. images placed inline in ResourceGroupContentItem).
 */
class Ern43CompatResourceGroupWrapper
{
    private $innerGroup;
    private $soundRecordingReferences;
    private $imageReferences;
    private $isCdLevel = false;

    /**
     * @param ResourceGroupType $innerGroup
     * @param string[] $soundRecordingReferences Resource references (e.g. "A1") that are SoundRecordings
     * @param string[] $imageReferences Resource references (e.g. "A3") that are Images
     */
    public function __construct($innerGroup, array $soundRecordingReferences = [], array $imageReferences = [])
    {
        $this->innerGroup = $innerGroup;
        $this->soundRecordingReferences = $soundRecordingReferences;
        $this->imageReferences = $imageReferences;
    }

    /**
     * Returns the CD-level sub-groups.
     * If the inner group already has sub-groups (nested case like Bundle),
     * return them directly. Otherwise, return this wrapper itself as the
     * CD-level group so filtering applies to getResourceGroupContentItem().
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

        // Flat case: return self as CD-level group with filtering enabled
        $cdWrapper = new self($this->innerGroup, $this->soundRecordingReferences, $this->imageReferences);
        $cdWrapper->isCdLevel = true;
        return [$cdWrapper];
    }

    /**
     * Returns content items.
     * When acting as CD-level group (flat case): excludes image resources
     * (which would crash SimpleTrack) but allows all other resource types through.
     * When acting as outer-level group: returns items from LinkedReleaseResourceReference.
     */
    public function getResourceGroupContentItem()
    {
        if ($this->innerGroup === null) {
            return [];
        }

        if ($this->isCdLevel) {
            $items = $this->innerGroup->getResourceGroupContentItem();
            if (empty($this->imageReferences)) {
                return $items;
            }
            return array_values(array_filter($items, function ($item) {
                $ref = $item->getReleaseResourceReference();
                $refValue = is_object($ref) && method_exists($ref, 'value') ? $ref->value() : (string) $ref;
                return !in_array($refValue, $this->imageReferences, true);
            }));
        }

        // Outer-level: images via LinkedReleaseResourceReference or inline content items
        $items = [];
        foreach ($this->innerGroup->getLinkedReleaseResourceReference() as $ref) {
            $refValue = is_object($ref) && method_exists($ref, 'value') ? $ref->value() : (string) $ref;
            $items[] = new Ern43CompatLinkedResourceItem($refValue);
        }
        // Also expose inline image content items (e.g. images placed in
        // ResourceGroupContentItem instead of LinkedReleaseResourceReference)
        if (!empty($this->imageReferences)) {
            foreach ($this->innerGroup->getResourceGroupContentItem() as $item) {
                $ref = $item->getReleaseResourceReference();
                $refValue = is_object($ref) && method_exists($ref, 'value') ? $ref->value() : (string) $ref;
                if (in_array($refValue, $this->imageReferences, true)) {
                    $items[] = new Ern43CompatLinkedResourceItem($refValue);
                }
            }
        }
        return $items;
    }

    public function getSequenceNumber()
    {
        if ($this->isCdLevel) {
            return $this->innerGroup->getSequenceNumber();
        }
        return null;
    }

    public function getLinkedReleaseResourceReference()
    {
        if ($this->innerGroup === null) {
            return [];
        }
        return $this->innerGroup->getLinkedReleaseResourceReference();
    }
}
