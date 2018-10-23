<?php
declare (strict_types = 1);

namespace App\Core\Application;

use App\Core\Application\DTO\ProjectDTO;
use App\Core\Domain\Project;
use App\Core\Domain\Event\ProjectWasCreated;
use App\Core\Domain\Repository\ProjectWriteRepository;
use Ramsey\Uuid\Uuid;

class ProjectService
{
    /** @var ProjectWriteRepository */
    private $writeRepository;

    public function __construct(ProjectWriteRepository $writeRepository)
    {
        $this->writeRepository = $writeRepository;
    }

    public function create(ProjectDTO $dto): ProjectWasCreated
    {
        $project = new Project(Uuid::uuid4(), $dto->getName(), $dto->getShortcut(), new \DateTimeImmutable());
        $this->writeRepository->save($project);

        return new ProjectWasCreated($project->getId());
    }
}