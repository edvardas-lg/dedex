<?php

namespace DedexBundle\Entity\Ern43;

/**
 * Class representing DeliveryFileType
 *
 * A Composite containing details of a DeliveryFile.
 * XSD Type: DeliveryFile
 */
class DeliveryFileType
{

    /**
     * A Type of the DeliveryFile.
     *
     * @var string $type
     */
    private $type = null;

    /**
     * A Composite containing details of a File.
     *
     * @var \DedexBundle\Entity\Ern43\FileType $file
     */
    private $file = null;

    /**
     * Gets as type
     *
     * A Type of the DeliveryFile.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets a new type
     *
     * A Type of the DeliveryFile.
     *
     * @param string $type
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Gets as file
     *
     * A Composite containing details of a File.
     *
     * @return \DedexBundle\Entity\Ern43\FileType
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Sets a new file
     *
     * A Composite containing details of a File.
     *
     * @param \DedexBundle\Entity\Ern43\FileType $file
     * @return self
     */
    public function setFile(\DedexBundle\Entity\Ern43\FileType $file)
    {
        $this->file = $file;
        return $this;
    }


}
