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

Each class extending Enum needs to call the init() method immediately after the class declaration.  This method replaces all variables with instances of the parent class, setting the `$_value` property to the original value of the property.  You can now access each property as an enumeration.  There is no need to manually instantiate anything.

`$today = DaysOfWeek::$MONDAY;`

`$today` is an object of type DaysOfWeek
```
print_r($today);
/*
DDesrosiers\Test\Enum\DaysOfWeek Object
(
    [value:DDesrosiers\Enum\Enum:private] => 1
)
*/
```
If you CTRL+hover over $MONDAY, PHPStorm tells you the value is "$MONDAY = 1: DaysOfWeek".

Adding the `@var static` annotation lets the IDE know that these variables are really instances of the DaysOfWeek class, not integers, so it will be able to provide hints and not detect an error when type hints expect an instance of DaysOfWeek.  This works in PHPStorm, other IDEs may work differently.

It can be used as a type hint to ensure the enum is valid.
```
function whatDayIsIt(DaysOfWeek $today)
{
    return (string) $today;
}

var_dump(whatDayIsIt($today));  // string(1) "1"
```

Enums can be compared using the identity operator.
```
var_dump($today === DaysOfWeek::$MONDAY); // bool(true)
var_dump($today === DaysOfWeek::$THURSDAY);  // bool(false)
```

They can be compared to values using the equality operator if the value can be casted to a string without losing information.
```
var_dump($today == 1); // bool(true)
var_dump($today == 4);  // bool(false)
```

But these methods are safer.
```
var_dump($today === DaysOfWeek::valueOf(1)); // bool(true)
var_dump($today->getValue() === 1); // bool(true)
```

Get all legal options.
```
print_r(DaysOfWeek::getValues());
/*
Array
(
    [SUNDAY] => 0
    [MONDAY] => 1
    [TUESDAY] => 2
    [WEDNESDAY] => 3
    [THURSDAY] => 4
    [FRIDAY] => 5
    [SATURDAY] => 6
)
*/
