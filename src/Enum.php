<?php

namespace DDesrosiers\Enum;

/**
 * Extend this class to implement an enum class.  The parent class should have public static variables for each valid
 * option with the enum value as initial value.  Put a type hint of "static" on each property so the IDE knows its
 * really an object of the parent class.
 */
abstract class Enum
{
    private $_value;

    /**
     * Given a value, returns the Enum representation for the value.  If the value is not valid for the enum,
     * an exception is thrown.
     *
     * @param $testValue
     * @return static
     */
    public static function valueOf($testValue)
    {
        foreach (get_class_vars(static::class) as $name => $value) {
            if ($value instanceof Enum && $value->getValue() === $testValue) {
                return static::$$name;
            }
        }

        throw new \InvalidArgumentException("Value $testValue is not a valid option for the " . static::class . " enum");
    }

    public static function getValues()
    {
        $values = get_class_vars(static::class);
        unset($values['_value']);

        $values = array_map(function (Enum $enum) {
            return $enum->getValue();
        }, $values);

        return $values;
    }

    private function __construct($value)
    {
        $this->_value = $value;
    }

    public function __toString()
    {
        return (string)$this->_value;
    }

    public function getValue()
    {
        return $this->_value;
    }

    /**
     * Replaces all properties of the parent to objects of this class with $this->_value set to the original
     * value of the property.
     *
     * IMPORTANT: This method must be called immediately after the parent class definition so it is called when the
     * class is auto loaded.
     */
    public static function init()
    {
        foreach (get_class_vars(static::class) as $name => $value) {
            if ($name != '_value') {
                static::$$name = new static($value);
            }
        }
    }
}