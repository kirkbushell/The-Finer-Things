<?php
namespace FinerThings\Domain\Identity\Roles;

use BeatSwitch\Lock\Lock;

class Reader implements Role
{
    private $lock;

    public function __construct(Lock $lock)
    {
        $this->lock = $lock;
    }

    public function permissions()
    {
        $this->lock->allow('submit', 'articles');
        $this->lock->allow('post', 'comments');
    }
}
