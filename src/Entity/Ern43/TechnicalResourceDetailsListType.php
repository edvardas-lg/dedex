<?php

namespace DedexBundle\Entity\Ern43;

/**
 * Class representing TechnicalResourceDetailsListType
 *
 * A Composite containing technical details of Resources.
 * XSD Type: TechnicalResourceDetailsList
 */
class TechnicalResourceDetailsListType
{

    /**
     * A Composite containing technical details of a Resource.
     *
     * @var \DedexBundle\Entity\Ern43\TechnicalResourceDetailsType[] $technicalResourceDetails
     */
    private $technicalResourceDetails = [

    ];

    /**
     * Adds as technicalResourceDetails
     *
     * A Composite containing technical details of a Resource.
     *
     * @return self
     * @param \DedexBundle\Entity\Ern43\TechnicalResourceDetailsType $technicalResourceDetails
     */
    public function addToTechnicalResourceDetails(\DedexBundle\Entity\Ern43\TechnicalResourceDetailsType $technicalResourceDetails)
    {
        $this->technicalResourceDetails[] = $technicalResourceDetails;
        return $this;
    }

    /**
     * isset technicalResourceDetails
     *
     * A Composite containing technical details of a Resource.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTechnicalResourceDetails($index)
    {
        return isset($this->technicalResourceDetails[$index]);
    }

    /**
     * unset technicalResourceDetails
     *
     * A Composite containing technical details of a Resource.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTechnicalResourceDetails($index)
    {
        unset($this->technicalResourceDetails[$index]);
    }

    /**
     * Gets as technicalResourceDetails
     *
     * A Composite containing technical details of a Resource.
     *
     * @return \DedexBundle\Entity\Ern43\TechnicalResourceDetailsType[]
     */
    public function getTechnicalResourceDetails()
    {
        return $this->technicalResourceDetails;
    }

    /**
     * Sets a new technicalResourceDetails
     *
     * A Composite containing technical details of a Resource.
     *
     * @param \DedexBundle\Entity\Ern43\TechnicalResourceDetailsType[] $technicalResourceDetails
     * @return self
     */
    public function setTechnicalResourceDetails(array $technicalResourceDetails)
    {
        $this->technicalResourceDetails = $technicalResourceDetails;
        return $this;
    }


}
