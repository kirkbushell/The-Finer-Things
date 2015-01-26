<?php
namespace FinerThings\Domain\Reviews;

use FinerThings\Core\Uuid\Uuid;

class ReviewId
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
}
