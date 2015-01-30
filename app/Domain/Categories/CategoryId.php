<?php
namespace FinerThings\Domain\Categories;

class CategoryId
{
	public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function equals(CategoryId $other)
    {
        return $this->id == $other->getId();
    }

    public function __toString()
    {
        return $this->getId();
    }
}
