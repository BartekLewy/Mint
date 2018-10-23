<?php
declare (strict_types = 1);

namespace App\Core\Domain\Repository;

use App\Core\Domain\Project;

interface ProjectWriteRepository
{
    public function save(Project $project): void;
}