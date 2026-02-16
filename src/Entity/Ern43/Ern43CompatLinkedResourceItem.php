<?php

namespace DedexBundle\Entity\Ern43;

/**
 * ERN 4.3 compatibility wrapper for linked resource references exposed as
 * ResourceGroupContentItem objects. Used by SimpleAlbum to detect images
 * (FrontCoverImage) at the outer ResourceGroup level.
 */
class Ern43CompatLinkedResourceItem
{
    private $reference;

    public function __construct($reference)
    {
        $this->reference = $reference;
    }

    public function getReleaseResourceReference()
    {
        return new Ern43CompatValue($this->reference);
    }

    /**
     * Returns resource type as "Image" since linked resources at the
     * ResourceGroup level are typically images in ERN 4.3.
     */
    public function getResourceType()
    {
        return [new Ern43CompatValue("Image")];
    }

    public function getSequenceNumber()
    {
        return null;
    }
}
