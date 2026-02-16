<?php

namespace DedexBundle\Entity\Ern43;

/**
 * ERN 4.3 compatibility wrapper for DealList.
 * In ERN 4.3 there is no DealListType class; getDealList() returns ReleaseDealType[]
 * directly. This wrapper provides getReleaseDeal() for compatibility with ERN 382
 * code that expects getDealList()->getReleaseDeal().
 */
class Ern43CompatDealList
{
    private $releaseDeals;

    public function __construct(array $releaseDeals = null)
    {
        $this->releaseDeals = $releaseDeals ?? [];
    }

    public function getReleaseDeal()
    {
        return $this->releaseDeals;
    }
}
