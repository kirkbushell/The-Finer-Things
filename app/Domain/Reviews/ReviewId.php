<?php
namespace FinerThings\Domain\Reviews;

use Buttercup\Protects\IdentifiesAggregate;
use FinerThings\Core\Uuid\Uuid;

class ReviewId implements IdentifiesAggregate
{
    use Uuid;

    /**
     * @var string
     */
    private $id;

    /**
     * @param string $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->id;
    }

    /**
     * Creates an identifier object from a string representation
     * @param $string
     * @return IdentifiesAggregate
     */
    public static function fromString($string)
    {
        return new static($string);
    }

    /**
     * Compares the object to another IdentifiesAggregate object. Returns true if both have the same type and value.
     * @param $other
     * @return boolean
     */
    public function equals(IdentifiesAggregate $other)
    {
        return $other instanceof ReviewId && $this->id() == $other->id();
    }
}
