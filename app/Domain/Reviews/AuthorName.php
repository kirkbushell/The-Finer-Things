<?php
namespace FinerThings\Domain\Reviews;

class AuthorName
{
    private $firstName;
    private $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function fullName()
    {
        return implode(' ', [$this->firstName(), $this->lastName()]);
    }

    public function firstName()
    {
        return $this->firstName;
    }

    public function lastName()
    {
        return $this->lastName;
    }
}