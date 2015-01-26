<?php
namespace FinerThings\Domain\Reviews;

use FinerThings\Core\Uuid\Uuid;

class AuthorId
{
    use Uuid;

    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function id()
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->id;
    }
}
