<?php

namespace Snroki\DateIntervalBundle\Tests\DateInterval;

use Snroki\DateIntervalBundle\DateInterval\DateInterval;

class DateIntervalTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testConstructDataProvider
     */
    public function testConstruct($interval, $expected)
    {
        $dateInterval = new DateInterval($interval);

        $this->assertSame($expected, $dateInterval->ms);
    }

    public function testConstructDataProvider()
    {
        return [
            ['PT30.500S', '500'],
            ['PT02H50M30S', null],
            ['PT02H50M30.999S', '999'],
            ['PT02H50M', null],
            ['P20DT99.99S', '99'],
            ['P20D', null],
        ];
    }

    /**
     * @dataProvider testFormatDataProvider
     */
    public function testFormat($interval, $format, $expected)
    {
        $dateInterval = new DateInterval($interval);
        $this->assertSame($expected, $dateInterval->format($format));
    }

    public function testFormatDataProvider()
    {
        return [
            ['PT30.500S', '%s', '30.500'],
            ['PT05H45S', '%h:%m:%s', '5:0:45'],
            ['PT5H20M21.11S', '%H-%I-%S', '05-20-21.11'],
            ['P20DT3M1.666S', '%S - %I - %D', '01.666 - 03 - 20'],
            ['PT5M5S', '%s, %i', '5, 5'],
        ];
    }
}