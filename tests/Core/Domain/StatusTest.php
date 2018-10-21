<?php

namespace App\Tests\Core\Domain;

use PHPUnit\Framework\TestCase;

use App\Core\Domain\Status;
use PHPUnit\Framework\Assert;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class StatusTest extends TestCase
{
    public function testShouldCreateStatus()
    {
        $uuid = Uuid::uuid4();
        $status = new Status($uuid, 'new');

        Assert::assertInstanceOf(UuidInterface::class, $status->getId());
        Assert::assertEquals($uuid, $status->getId());
        Assert::assertEquals('new', $status->getKey());
    }
}