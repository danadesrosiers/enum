# enum
A type safe implementation of enumerations for PHP

It is unfortunate that PHP does not natively support enumerations (though it sounds like that may be coming soon).  Many have tried to build their own Enum types, but I haven't found anything that I'm completely happy with.  This is my attempt.  Its type safe, meaning that the values are objects and can be type hinted in the IDE.

Example:
```
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
```

TODO: More explanation and example usage.
