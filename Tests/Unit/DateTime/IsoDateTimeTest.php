<?php

namespace RZT\Taskhub\Tests\Unit\DateTime;

use PHPUnit\Framework\TestCase;
use RZT\Taskhub\DateTime\IsoDateTime;

class IsoDateTimeTest extends TestCase
{
    /**
     * @test
     */
    public function toStringReturnsIsoFormattedDate()
    {
        $date = new IsoDateTime('2023-08-15');
        static::assertEquals('2023-08-15', (string)$date);
    }

    /**
     * @test
     */
    public function toDateTimeReturnsStandardDateTime()
    {
        $isoDate = new IsoDateTime('2023-08-15');
        $dateTime = $isoDate->toDateTime();

        static::assertInstanceOf(\DateTime::class, $dateTime);
        static::assertNotInstanceOf(IsoDateTime::class, $dateTime);
        static::assertEquals($isoDate->getTimestamp(), $dateTime->getTimestamp());
    }

}
