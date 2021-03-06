<?php
declare (strict_types = 1);

namespace App\Tests\Core\Domain;

use App\Core\Domain\Author;
use App\Core\Domain\Status;
use App\Core\Domain\Task;
use App\Core\Domain\ValueObject\Email;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;


class TaskTest extends TestCase
{
    public function testShouldCreateTask(): void
    {
        $createdAt = new \DateTimeImmutable();
        $status = new Status(Uuid::uuid4(), 'new');
        $author = new Author(Uuid::uuid4(), 'Bartosz Lewandowski', new Email('test@test.test'));
        $task = new Task(Uuid::uuid4(), 'Title of task', 'short description', [], $status, $author, $createdAt, null);

        Assert::assertInstanceOf(UuidInterface::class, $task->getId());
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