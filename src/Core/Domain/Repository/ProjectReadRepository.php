<?php

namespace App\Core\Domain\Repository;

interface ProjectReadRepository
{
    public function exists(string $name, string $shortcut): bool;
}