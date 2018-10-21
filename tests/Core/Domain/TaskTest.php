<?php

namespace App\Tests\Core\Domain;

use App\Core\Domain\Author;
use App\Core\Domain\Status;
use App\Core\Domain\Task;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;


class TaskTest extends TestCase
{
    public function testShouldCreateTask()
    {
        $createdAt = new \DateTimeImmutable();
        $status = new Status(Uuid::uuid4(), 'new');
        $author = new Author(Uuid::uuid4(), 'Bartosz Lewandowski');
        $task = new Task(Uuid::uuid4(), 'Title of task', 'short description', [], $status, $author, $createdAt, null);

        Assert::assertEquals('Title of task', $task->getTitle());
        Assert::assertEquals('short description', $task->getDescription());
        Assert::assertEquals($createdAt, $task->getCreatedAt());
        Assert::assertNull($task->getUpdatedAt());
        Assert::assertEquals([], $task->getLabels());
        Assert::assertEquals($status, $task->getStatus());
        Assert::assertEquals($author, $task->getAuthor());
        Assert::assertNull($task->getAssigned());
    }
}