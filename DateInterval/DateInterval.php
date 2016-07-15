<?php

namespace Snroki\DateIntervalBundle\DateInterval;

class DateInterval extends \DateInterval
{
    /**
     * @var int
     */
    public $ms;

    /**
     * @param string $interval_spec
     */
    public function __construct($interval_spec)
    {
        // Keep the milliseconds and strip them to avoid an exception
        if (preg_match('/\.(\d+)S/', $interval_spec, $matches)) {
            $this->ms = $matches[1];
            $interval_spec = preg_replace('/\.(\d+)S/', 'S', $interval_spec);
        }

        parent::__construct($interval_spec);
    }

    /**
     * @param string $format
     * @return string
     */
    public function format($format)
    {
        $formattedInterval = parent::format($format);

        // Allow to put back the stripped milliseconds if the seconds are requested in the format
        if ((false !== $position = stripos($format, '%s')) && !empty($this->ms)) {
            $formattedInterval = substr_replace($formattedInterval, '.' . $this->ms, $position + 2, 0);
        }

        return $formattedInterval;
    }
}