<?php
namespace FinerThings\Domain\Identity\Roles;

interface Role
{
    /**
     * Set up the permissions defined for the role.
     *
     * @return void
     */
    public function permissions();
}
