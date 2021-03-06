<?php
declare (strict_types = 1);

namespace App\Core\Domain;

use App\Core\Domain\Exception\InvalidProjectNameException;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;


class Project
{
    private const MIN_LENGTH_NAME = 6;
    private const MAX_LENGTH_NAME = 32;

    /** @var UuidInterface */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $shortcut;

    /** @var \DateTimeInterface */
    private $createdAt;

    /** @var \DateTimeInterface */
    private $updatedAt;

    public function __construct(
        UuidInterface $id,
        string $name,
        string $shortcut,
        \DateTimeInterface $createdAt,
        \DateTimeInterface $updatedAt = null
    )
    {
        $this->id = $id;
        $this->setName($name);
        $this->shortcut = $shortcut;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getShortcut(): string
    {
        return $this->shortcut;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    private function setName(string $name): void
    {
        if (mb_strlen($name) <= self::MIN_LENGTH_NAME) {
            throw new InvalidProjectNameException('Project name is too short');
        }

        if (mb_strlen($name) >= self::MAX_LENGTH_NAME) {
            throw new InvalidProjectNameException('Project name is too long');
        }

        $this->name = $name;
    }

    private function changeUpdatedAt(): void
    {
        $this->updatedAt = new \DateTimeImmutable();
    }

    public function changeName($name): void
    {
        $this->setName($name);
        $this->changeUpdatedAt();
    }
}