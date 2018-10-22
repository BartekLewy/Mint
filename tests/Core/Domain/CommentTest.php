<?php
declare (strict_types = 1);

namespace App\Tests\Core\Domain;

use App\Core\Domain\{Author, Comment};
use App\Core\Domain\ValueObject\Email;
use PHPUnit\Framework\{Assert, TestCase};
use Ramsey\Uuid\Uuid;

class CommentTest extends TestCase
{
    public function testShouldCreateComment(): void
    {
        $uuid = Uuid::uuid4();
        $author = new Author(Uuid::uuid4(), 'Bartosz Lewandowski', new Email('test@test.test'));
        $comment = new Comment($uuid, $uuid, 'content of comment', $author);

        Assert::assertEquals($uuid, $comment->getId());
        Assert::assertEquals($uuid, $comment->getTaskId());
        Assert::assertEquals('content of comment', $comment->getContent());
        Assert::assertEquals($author, $comment->getAuthor());
    }
}