<?php
declare (strict_types = 1);

namespace App\Core\Application;

use App\Core\Application\DTO\ProjectDTO;
use App\Core\Domain\Project;
use App\Core\Domain\Event\ProjectWasCreated;
use App\Core\Domain\Exception\DuplicateDetectedException;
use App\Core\Domain\Repository\ProjectReadRepository;
use App\Core\Domain\Repository\ProjectWriteRepository;
use Ramsey\Uuid\Uuid;

class ProjectService
{
    /** @var ProjectWriteRepository */
    private $writeRepository;

    /** @var ProjectReadRepository */
    private $readRepository;

    public function __construct(ProjectWriteRepository $writeRepository, ProjectReadRepository $readRepository)
    {
        $this->writeRepository = $writeRepository;
        $this->readRepository = $readRepository;
    }

    public function create(ProjectDTO $dto): ProjectWasCreated
    {
        if ($this->readRepository->exists($dto->getName(), $dto->getShortcut())) {
            throw new DuplicateDetectedException('Project with this name or shortcut exists');
        }

        $project = new Project(Uuid::uuid4(), $dto->getName(), $dto->getShortcut(), new \DateTimeImmutable());
        $this->writeRepository->save($project);

        return new ProjectWasCreated($project->getId());
    }
}