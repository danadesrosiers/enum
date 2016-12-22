<?php

namespace DDesrosiers\Test\Enum;

use DDesrosiers\Enum\Enum;

class DaysOfWeek extends Enum
{
    /** @var static */
    public static $SUNDAY = 0;
    /** @var static */
    public static $MONDAY = 1;
    /** @var static */
    public static $TUESDAY = 2;
    /** @var static */
    public static $WEDNESDAY = 3;
    /** @var static */
    public static $THURSDAY = 4;
    /** @var static */
    public static $FRIDAY = 5;
    /** @var static */
    public static $SATURDAY = 6;
}

DaysOfWeek::init();