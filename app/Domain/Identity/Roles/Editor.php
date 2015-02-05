<?php
namespace FinerThings\Domain\Identity\Roles;

class Editor implements Role
{
    /**
     * Set up the permissions defined for the role.
     *
     * @return void
     */
    public function permissions()
    {
        $this->allow('manage', 'articles');
        $this->allow('publish', 'articles');
        $this->allow('manage', 'comments');
        $this->allow('remove', 'comments');
    }
}
