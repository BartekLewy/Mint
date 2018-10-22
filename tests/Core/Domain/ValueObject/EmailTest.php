<?php
declare (strict_types = 1);

namespace App\Tests\Core\Domain;

use App\Core\Domain\ValueObject\Email;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;


class EmailTest extends TestCase
{
    public function testShouldCreateEmail(): void
    {
        $email = new Email('test@test.com');
        Assert::assertEquals('test@test.com', $email->getEmail());
    }

    public function testShouldThrowException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $email = new Email('test');
    }
}