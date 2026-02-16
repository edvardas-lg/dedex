<?php

namespace DedexBundle\Entity\Ern43;

/**
 * ERN 4.3 compatibility adapter: wraps a TrackReleaseType to present the
 * same API as ReleaseType, so Simplifiers can iterate all releases uniformly.
 *
 * In ERN 382, both album and track releases are <Release> elements.
 * In ERN 4.3, track releases are separate <TrackRelease> elements with a
 * different class. This adapter bridges that gap.
 */
class Ern43CompatTrackRelease
{
    /** @var TrackReleaseType */
    private $wrapped;

    public function __construct(TrackReleaseType $trackRelease)
    {
        $this->wrapped = $trackRelease;
    }

    /**
     * Returns "TrackRelease" as the release type, wrapped for value() access.
     * SimpleAlbum checks this to distinguish album vs track releases.
     *
     * @return Ern43CompatValue[]
     */
    public function getReleaseType()
    {
        return [new Ern43CompatValue("TrackRelease")];
    }

    /**
     * Returns release reference as array for ERN 382 API compatibility.
     *
     * @return string[]
     */
    public function getReleaseReference()
    {
        return [$this->wrapped->getReleaseReference()];
    }

    /**
     * Returns the release resource reference list for SimpleAlbum's
     * getResourcesReferencesFromTrackRelease() method.
     * Each item needs getReleaseResourceType() and value() methods.
     *
     * @return Ern43CompatValue[]
     */
    public function getReleaseResourceReferenceList()
    {
        $ref = $this->wrapped->getReleaseResourceReference();
        if ($ref === null) {
            return [];
        }
        return [new Ern43CompatValue($ref, null, "PrimaryResource")];
    }

    /**
     * Delegates to wrapped TrackReleaseType (returns null, track releases are not main).
     * The OnlyOneMainRelease rule checks strtolower((string) $release->getIsMainRelease()).
     *
     * @return null
     */
    public function getIsMainRelease()
    {
        return $this->wrapped->getIsMainRelease();
    }
}
