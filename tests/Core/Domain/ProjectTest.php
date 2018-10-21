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

    /**
     * @dataProvider invalidProjectNamesDataProvider
     */
    public function testShouldThrowInvalidProjectNameException($name)
    {
        $this->expectException(InvalidProjectNameException::class);
        $project = new Project($name, 'App');
    }

    public function invalidProjectNamesDataProvider(): array
    {
        return [['', 'Inva', 'It is not the best name for project cause it is to long']];
    }
}