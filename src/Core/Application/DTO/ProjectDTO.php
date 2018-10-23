<?php
declare (strict_types = 1);

namespace App\Core\Application\DTO;

class ProjectDTO
{
    /** @var string */
    private $name;

    /** @var string */
    private $shortcut;

    public function __construct(string $name, string $shortcut)
    {
        $this->name = $name;
        $this->shortcut = $shortcut;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getShortcut(): string
    {
        return $this->shortcut;
    }
}