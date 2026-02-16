<?php

namespace DedexBundle\Entity\Ern43;

/**
 * Class representing TechnicalResourceDetailsType
 *
 * A Composite containing technical details of a Resource.
 * XSD Type: TechnicalResourceDetails
 */
class TechnicalResourceDetailsType
{

    /**
     * The Identifier (specific to the Message) of the TechnicalResourceDetails within the Release which contains it.
     *
     * @var string $technicalResourceDetailsReference
     */
    private $technicalResourceDetailsReference = null;

    /**
     * A Composite containing details of a Type of AudioCodec.
     *
     * @var \DedexBundle\Entity\Ern43\AudioCodecTypeType $audioCodecType
     */
    private $audioCodecType = null;

    /**
     * A Composite containing the BitRate for the audio data and a UnitOfMeasure (the default is kbps).
     *
     * @var \DedexBundle\Entity\Ern43\BitRateType $bitRate
     */
    private $bitRate = null;

    /**
     * A Composite containing the SamplingRate of the SoundRecording and a UnitOfMeasure (the default is Hz).
     *
     * @var \DedexBundle\Entity\Ern43\SamplingRateType $samplingRate
     */
    private $samplingRate = null;

    /**
     * The BitsPerSample of the SoundRecording.
     *
     * @var int $bitsPerSample
     */
    private $bitsPerSample = null;

    /**
     * A number of channels.
     *
     * @var int $numberOfChannels
     */
    private $numberOfChannels = null;

    /**
     * The Duration (using the ISO 8601:2004 PT[[hhH]mmM]ssS format).
     *
     * @var \DateInterval $duration
     */
    private $duration = null;

    /**
     * The FileSize of the File.
     *
     * @var float $fileSize
     */
    private $fileSize = null;

    /**
     * A Composite containing details of a Type of ImageCodec.
     *
     * @var \DedexBundle\Entity\Ern43\ImageCodecTypeType $imageCodecType
     */
    private $imageCodecType = null;

    /**
     * The Width of the Image (in Pixels).
     *
     * @var int $imageWidth
     */
    private $imageWidth = null;

    /**
     * The Height of the Image (in Pixels).
     *
     * @var int $imageHeight
     */
    private $imageHeight = null;

    /**
     * Gets as technicalResourceDetailsReference
     *
     * @return string
     */
    public function getTechnicalResourceDetailsReference()
    {
        return $this->technicalResourceDetailsReference;
    }

    /**
     * Sets a new technicalResourceDetailsReference
     *
     * @param string $technicalResourceDetailsReference
     * @return self
     */
    public function setTechnicalResourceDetailsReference($technicalResourceDetailsReference)
    {
        $this->technicalResourceDetailsReference = $technicalResourceDetailsReference;
        return $this;
    }

    /**
     * Gets as audioCodecType
     *
     * @return \DedexBundle\Entity\Ern43\AudioCodecTypeType
     */
    public function getAudioCodecType()
    {
        return $this->audioCodecType;
    }

    /**
     * Sets a new audioCodecType
     *
     * @param \DedexBundle\Entity\Ern43\AudioCodecTypeType $audioCodecType
     * @return self
     */
    public function setAudioCodecType(\DedexBundle\Entity\Ern43\AudioCodecTypeType $audioCodecType)
    {
        $this->audioCodecType = $audioCodecType;
        return $this;
    }

    /**
     * Gets as bitRate
     *
     * @return \DedexBundle\Entity\Ern43\BitRateType
     */
    public function getBitRate()
    {
        return $this->bitRate;
    }

    /**
     * Sets a new bitRate
     *
     * @param \DedexBundle\Entity\Ern43\BitRateType $bitRate
     * @return self
     */
    public function setBitRate(\DedexBundle\Entity\Ern43\BitRateType $bitRate)
    {
        $this->bitRate = $bitRate;
        return $this;
    }

    /**
     * Gets as samplingRate
     *
     * @return \DedexBundle\Entity\Ern43\SamplingRateType
     */
    public function getSamplingRate()
    {
        return $this->samplingRate;
    }

    /**
     * Sets a new samplingRate
     *
     * @param \DedexBundle\Entity\Ern43\SamplingRateType $samplingRate
     * @return self
     */
    public function setSamplingRate(\DedexBundle\Entity\Ern43\SamplingRateType $samplingRate)
    {
        $this->samplingRate = $samplingRate;
        return $this;
    }

    /**
     * Gets as bitsPerSample
     *
     * @return int
     */
    public function getBitsPerSample()
    {
        return $this->bitsPerSample;
    }

    /**
     * Sets a new bitsPerSample
     *
     * @param int $bitsPerSample
     * @return self
     */
    public function setBitsPerSample($bitsPerSample)
    {
        $this->bitsPerSample = $bitsPerSample;
        return $this;
    }

    /**
     * Gets as numberOfChannels
     *
     * @return int
     */
    public function getNumberOfChannels()
    {
        return $this->numberOfChannels;
    }

    /**
     * Sets a new numberOfChannels
     *
     * @param int $numberOfChannels
     * @return self
     */
    public function setNumberOfChannels($numberOfChannels)
    {
        $this->numberOfChannels = $numberOfChannels;
        return $this;
    }

    /**
     * Gets as duration
     *
     * @return \DateInterval
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Sets a new duration
     *
     * @param \DateInterval $duration
     * @return self
     */
    public function setDuration(\DateInterval $duration)
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * Gets as fileSize
     *
     * @return float
     */
    public function getFileSize()
    {
        return $this->fileSize;
    }

    /**
     * Sets a new fileSize
     *
     * @param float $fileSize
     * @return self
     */
    public function setFileSize($fileSize)
    {
        $this->fileSize = $fileSize;
        return $this;
    }

    /**
     * Gets as imageCodecType
     *
     * @return \DedexBundle\Entity\Ern43\ImageCodecTypeType
     */
    public function getImageCodecType()
    {
        return $this->imageCodecType;
    }

    /**
     * Sets a new imageCodecType
     *
     * @param \DedexBundle\Entity\Ern43\ImageCodecTypeType $imageCodecType
     * @return self
     */
    public function setImageCodecType(\DedexBundle\Entity\Ern43\ImageCodecTypeType $imageCodecType)
    {
        $this->imageCodecType = $imageCodecType;
        return $this;
    }

    /**
     * Gets as imageWidth
     *
     * @return int
     */
    public function getImageWidth()
    {
        return $this->imageWidth;
    }

    /**
     * Sets a new imageWidth
     *
     * @param int $imageWidth
     * @return self
     */
    public function setImageWidth($imageWidth)
    {
        $this->imageWidth = $imageWidth;
        return $this;
    }

    /**
     * Gets as imageHeight
     *
     * @return int
     */
    public function getImageHeight()
    {
        return $this->imageHeight;
    }

    /**
     * Sets a new imageHeight
     *
     * @param int $imageHeight
     * @return self
     */
    public function setImageHeight($imageHeight)
    {
        $this->imageHeight = $imageHeight;
        return $this;
    }


}
