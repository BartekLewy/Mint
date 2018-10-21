<?php
declare(strict_types=1);

namespace App\Core\Domain;

use Ramsey\Uuid\UuidInterface;
use phpDocumentor\Reflection\Types\Null_;

class Task
{
    /** @var UuidInterface */
    private $id;

    /** @var string */
    private $title;

    /** @var string */
    private $description;

    /** @var string */
    private $labels = [];

    /** @var Status */
    private $status;

    /** @var Author */
    private $author;

    /** @var Assigned */
    private $assigned;

    /** @var \DateTimeInterface */
    private $createdAt;

    /** @var \DateTimeInterface */
    private $updatedAt;

    public function __construct(
        UuidInterface $id,
        string $title,
        string $description,
        array $labels,
        Status $status,
        Author $author,
        \DateTimeInterface $createdAt,
        \DateTimeInterface $updatedAt = null
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->labels = $labels;
        $this->status = $status;
        $this->author = $author;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getLabels(): array
    {
        return $this->labels;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function getAuthor(): Author
    {
        return $this->author;
    }

    public function getAssigned()
    {
        return $this->assigned;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }
}