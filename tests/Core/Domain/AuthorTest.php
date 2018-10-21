<?php

namespace App\Tests\Core\Domain;

use App\Core\Domain\Author;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;


class AuthorTest extends TestCase
{
    public function testShouldCreateAuthor()
    {
        $uuid = Uuid::uuid4();
        $author = new Author($uuid, 'Bartosz Lewandowski', new Email('test@test.test'));

        Assert::assertEquals($uuid, $author->getId());
        Assert::assertEquals('Bartosz Lewandowski', $author->getName());
        Assert::assertEquals(new Email('test@test.test'), $author->getEmail());
    }
}