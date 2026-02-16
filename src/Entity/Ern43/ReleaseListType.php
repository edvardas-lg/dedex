<?php

namespace DedexBundle\Entity\Ern43;

/**
 * Class representing ReleaseListType
 *
 * A Composite containing details of one or more Releases.
 * XSD Type: ReleaseList
 */
class ReleaseListType
{

    /**
     * A Composite containing details of a DDEX Release.
     *
     * @var \DedexBundle\Entity\Ern43\ReleaseType $release
     */
    private $release = null;

    /**
     * A Composite containing details of a DDEX TrackRelease.
     *
     * @var \DedexBundle\Entity\Ern43\TrackReleaseType[] $trackRelease
     */
    private $trackRelease = [
        
    ];

    /**
     * Pass-through: injects party map into the stored release for label name resolution.
     *
     * @param array $partyMap
     * @return self
     */
    public function setPartyMap(array $partyMap)
    {
        if ($this->release !== null) {
            $this->release->setPartyMap($partyMap);
        }
        return $this;
    }

    /**
     * Gets as release
     *
     * ERN 4.3 compat: merges the main Release with adapted TrackReleases
     * into a single array for ERN 382 API compatibility.
     * ERN 382 code iterates getRelease() expecting all releases (album + tracks).
     *
     * @return \DedexBundle\Entity\Ern43\ReleaseType[]
     */
    public function getRelease()
    {
        $releases = $this->release !== null ? [$this->release] : [];
        foreach ($this->trackRelease as $tr) {
            $releases[] = new Ern43CompatTrackRelease($tr);
        }
        return $releases;
    }

    /**
     * Sets a new release
     *
     * A Composite containing details of a DDEX Release.
     *
     * @param \DedexBundle\Entity\Ern43\ReleaseType $release
     * @return self
     */
    public function setRelease(\DedexBundle\Entity\Ern43\ReleaseType $release)
    {
        $this->release = $release;
        return $this;
    }

    /**
     * Adds as trackRelease
     *
     * A Composite containing details of a DDEX TrackRelease.
     *
     * @return self
     * @param \DedexBundle\Entity\Ern43\TrackReleaseType $trackRelease
     */
    public function addToTrackRelease(\DedexBundle\Entity\Ern43\TrackReleaseType $trackRelease)
    {
        $this->trackRelease[] = $trackRelease;
        return $this;
    }

    /**
     * isset trackRelease
     *
     * A Composite containing details of a DDEX TrackRelease.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTrackRelease($index)
    {
        return isset($this->trackRelease[$index]);
    }

    /**
     * unset trackRelease
     *
     * A Composite containing details of a DDEX TrackRelease.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTrackRelease($index)
    {
        unset($this->trackRelease[$index]);
    }

    /**
     * Gets as trackRelease
     *
     * A Composite containing details of a DDEX TrackRelease.
     *
     * @return \DedexBundle\Entity\Ern43\TrackReleaseType[]
     */
    public function getTrackRelease()
    {
        return $this->trackRelease;
    }

    /**
     * Sets a new trackRelease
     *
     * A Composite containing details of a DDEX TrackRelease.
     *
     * @param \DedexBundle\Entity\Ern43\TrackReleaseType[] $trackRelease
     * @return self
     */
    public function setTrackRelease(array $trackRelease)
    {
        $this->trackRelease = $trackRelease;
        return $this;
    }


}

