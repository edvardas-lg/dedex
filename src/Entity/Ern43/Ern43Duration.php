<?php

namespace DedexBundle\Entity\Ern43;

/**
 * ERN 4.3 duration wrapper that handles fractional seconds in ISO 8601 durations.
 * PHP's DateInterval does not support fractional seconds (e.g. PT4M23.583S),
 * so this class strips them before constructing the interval.
 */
class Ern43Duration extends \DateInterval
{
    public function __construct(?string $duration = null)
    {
        // The parser instantiates with null initially, then sets the actual value later.
        if ($duration === null) {
            parent::__construct("PT0M0S");
            return;
        }
        // Strip fractional seconds (e.g. PT4M23.583S → PT4M23S)
        if (preg_match('/\d+\.\d+S/', $duration)) {
            $duration = preg_replace('/(\d+)\.\d+S/', '$1S', $duration);
        }
        parent::__construct($duration);
    }
}
