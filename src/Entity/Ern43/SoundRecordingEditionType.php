<?php

namespace DedexBundle\Entity\Ern43;

/**
 * Class representing SoundRecordingEditionType
 *
 * A Composite containing details of a SoundRecordingEdition.
 * XSD Type: SoundRecordingEdition
 */
class SoundRecordingEditionType
{

    /**
     * A Composite containing details of a SoundRecordingId.
     *
     * @var \DedexBundle\Entity\Ern43\SoundRecordingIdType[] $resourceId
     */
    private $resourceId = [

    ];

    /**
     * A Composite containing details of the PLine for the SoundRecording.
     *
     * @var \DedexBundle\Entity\Ern43\PLineWithDefaultType[] $pLine
     */
    private $pLine = [

    ];

    /**
     * A Composite containing technical details of the SoundRecording.
     *
     * @var \DedexBundle\Entity\Ern43\TechnicalSoundRecordingDetailsType[] $technicalDetails
     */
    private $technicalDetails = [

    ];

    /**
     * Adds as resourceId
     *
     * A Composite containing details of a SoundRecordingId.
     *
     * @return self
     * @param \DedexBundle\Entity\Ern43\SoundRecordingIdType $resourceId
     */
    public function addToResourceId(\DedexBundle\Entity\Ern43\SoundRecordingIdType $resourceId)
    {
        $this->resourceId[] = $resourceId;
        return $this;
    }

    /**
     * isset resourceId
     *
     * A Composite containing details of a SoundRecordingId.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetResourceId($index)
    {
        return isset($this->resourceId[$index]);
    }

    /**
     * unset resourceId
     *
     * A Composite containing details of a SoundRecordingId.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetResourceId($index)
    {
        unset($this->resourceId[$index]);
    }

    /**
     * Gets as resourceId
     *
     * A Composite containing details of a SoundRecordingId.
     *
     * @return \DedexBundle\Entity\Ern43\SoundRecordingIdType[]
     */
    public function getResourceId()
    {
        return $this->resourceId;
    }

    /**
     * Sets a new resourceId
     *
     * A Composite containing details of a SoundRecordingId.
     *
     * @param \DedexBundle\Entity\Ern43\SoundRecordingIdType[] $resourceId
     * @return self
     */
    public function setResourceId(array $resourceId)
    {
        $this->resourceId = $resourceId;
        return $this;
    }

    /**
     * Adds as pLine
     *
     * A Composite containing details of the PLine for the SoundRecording.
     *
     * @return self
     * @param \DedexBundle\Entity\Ern43\PLineWithDefaultType $pLine
     */
    public function addToPLine(\DedexBundle\Entity\Ern43\PLineWithDefaultType $pLine)
    {
        $this->pLine[] = $pLine;
        return $this;
    }

    /**
     * isset pLine
     *
     * A Composite containing details of the PLine for the SoundRecording.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPLine($index)
    {
        return isset($this->pLine[$index]);
    }

    /**
     * unset pLine
     *
     * A Composite containing details of the PLine for the SoundRecording.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPLine($index)
    {
        unset($this->pLine[$index]);
    }

    /**
     * Gets as pLine
     *
     * A Composite containing details of the PLine for the SoundRecording.
     *
     * @return \DedexBundle\Entity\Ern43\PLineWithDefaultType[]
     */
    public function getPLine()
    {
        return $this->pLine;
    }

    /**
     * Sets a new pLine
     *
     * A Composite containing details of the PLine for the SoundRecording.
     *
     * @param \DedexBundle\Entity\Ern43\PLineWithDefaultType[] $pLine
     * @return self
     */
    public function setPLine(array $pLine)
    {
        $this->pLine = $pLine;
        return $this;
    }

    /**
     * Adds as technicalDetails
     *
     * A Composite containing technical details of the SoundRecording.
     *
     * @return self
     * @param \DedexBundle\Entity\Ern43\TechnicalSoundRecordingDetailsType $technicalDetails
     */
    public function addToTechnicalDetails(\DedexBundle\Entity\Ern43\TechnicalSoundRecordingDetailsType $technicalDetails)
    {
        $this->technicalDetails[] = $technicalDetails;
        return $this;
    }

    /**
     * isset technicalDetails
     *
     * A Composite containing technical details of the SoundRecording.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTechnicalDetails($index)
    {
        return isset($this->technicalDetails[$index]);
    }

    /**
     * unset technicalDetails
     *
     * A Composite containing technical details of the SoundRecording.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTechnicalDetails($index)
    {
        unset($this->technicalDetails[$index]);
    }

    /**
     * Gets as technicalDetails
     *
     * A Composite containing technical details of the SoundRecording.
     *
     * @return \DedexBundle\Entity\Ern43\TechnicalSoundRecordingDetailsType[]
     */
    public function getTechnicalDetails()
    {
        return $this->technicalDetails;
    }

    /**
     * Sets a new technicalDetails
     *
     * A Composite containing technical details of the SoundRecording.
     *
     * @param \DedexBundle\Entity\Ern43\TechnicalSoundRecordingDetailsType[] $technicalDetails
     * @return self
     */
    public function setTechnicalDetails(array $technicalDetails)
    {
        $this->technicalDetails = $technicalDetails;
        return $this;
    }


}
