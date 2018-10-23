<?php
declare (strict_types = 1);

namespace App\Tests\Core\Application\DTO;

use App\Core\Application\DTO\ProjectDTO;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class ProjectDTOTest extends TestCase
{
    public function testShouldPassStructure(): void
    {
        $dto = new ProjectDTO('Project name', 'SHORT');

        Assert::assertEquals($dto->getName(), 'Project name');
        Assert::assertEqUals($dto->getShortcut(), 'SHORT');
    }
}