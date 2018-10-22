<?php
declare (strict_types = 1);


namespace App\Core\Domain;

use App\Core\Domain\Author;
use Ramsey\Uuid\UuidInterface;

class Comment
{
    /** @var UuidInterface */
    private $id;

    /** @var UuidInterface */
    private $taskId;

    /** @var string */
    private $content;

    /** @var Author */
    private $author;

    public function __construct(UuidInterface $id, UuidInterface $taskId, string $content, Author $author)
    {
        $this->id = $id;
        $this->taskId = $taskId;
        $this->content = $content;
        $this->author = $author;
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getTaskId(): UuidInterface
    {
        return $this->taskId;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getAuthor(): Author
    {
        return $this->author;
    }
}