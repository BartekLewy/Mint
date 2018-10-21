<?php

namespace App\Tests\Core\Domain;

use App\Core\Domain\Project;
use App\Core\Domain\Exception\InvalidProjectNameException;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;


class ProjectTests extends TestCase
{
    public function testShouldCreateProject()
    {
        $project = new Project('Web Application', 'WEBAPP');

        Assert::assertNotNull($project->getId());
        Assert::assertEquals('Web Application', $project->getName());
        Assert::assertEquals('WEBAPP', $project->getShortcut());
    }

    public function testShouldThrowInvalidProjectNameException()
    {
        $this->expectException(InvalidProjectNameException::class);
        $project = new Project('', 'App');
    }
}