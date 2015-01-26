<?php
namespace FinerThings\Core\Uuid;

trait Uuid
{
    /**
     * Generate a new UUID to be used for the id.
     *
     * @return static
     */
    public static function generate()
    {
        $uuid = \Rhumsaa\Uuid\Uuid::uuid4();

        return new static($uuid->toString());
    }
}
 