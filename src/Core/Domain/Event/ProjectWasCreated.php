<?php

namespace App\Core\Domain\Event;

use Ramsey\Uuid\UuidInterface;
use Ramsey\Uuid\Uuid;

class ProjectWasCreated
{
    /** @var UuidInterface */
    private $id;

    /** @var UuidInterface */
    private $projectId;

    /** @var \DateTimeInterfce */
    private $occuredOn;

    public function __construct(UuidInterface $projectId)
    {
        $this->id = Uuid::uuid4();
        $this->projectId = $projectId;
        $this->occuredOn = new \DateTimeImmutable();
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getProjectId(): UuidInterface
    {
        return $this->projectId;
    }

    public function getOccuredOn(): \DateTimeInterface
    {
        return $this->occuredOn;
    }
}