<?php

namespace DDesrosiers\Test\Enum;

use PHPUnit\Framework\TestCase;

class EnumTest extends TestCase
{
    public function testInit()
    {
        $this->assertInstanceOf(DaysOfWeek::class, DaysOfWeek::$MONDAY);
    }

    public function testToString()
    {
        $this->assertTrue(1 == DaysOfWeek::$MONDAY);
        $this->assertTrue('1' == DaysOfWeek::$MONDAY);
        $this->assertFalse(1 === DaysOfWeek::$MONDAY);
        $this->assertFalse('1' === DaysOfWeek::$MONDAY);
    }

    public function testGetValue()
    {
        $this->assertSame(2, DaysOfWeek::$TUESDAY->getValue());
    }

    public function testGetValues()
    {
        $this->assertEquals([
            'SUNDAY' => 0,
            'MONDAY' => 1,
            'TUESDAY' => 2,
            'WEDNESDAY' => 3,
            'THURSDAY' => 4,
            'FRIDAY' => 5,
            'SATURDAY' => 6
        ], DaysOfWeek::getValues());
    }

    public function testValueOf()
    {
        $this->assertEquals(DaysOfWeek::$FRIDAY, DaysOfWeek::valueOf(5));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testNotValueOf()
    {
        DaysOfWeek::valueOf(7);
    }
}