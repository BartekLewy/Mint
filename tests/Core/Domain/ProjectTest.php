<?php
declare (strict_types = 1);

namespace App\Tests\Core\Domain;

use App\Core\Domain\Project;
use App\Core\Domain\Task;
use App\Core\Domain\Exception\InvalidProjectNameException;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;
use Ramsey\Uuid\Uuid;


class ProjectTests extends TestCase
{
    public function testShouldCreateProject(): void
    {
        $project = self::createValidProject();

        Assert::assertNotNull($project->getId());
        Assert::assertEquals('Web Application', $project->getName());
        Assert::assertEquals('WEBAPP', $project->getShortcut());
        Assert::assertInstanceOf(\DateTimeInterface::class, $project->getCreatedAt());
        Assert::assertNull($project->getUpdatedAt());
    }

    /**
     * @dataProvider invalidProjectNamesDataProvider
     */
    public function testShouldThrowInvalidProjectNameException($name): void
    {
        $this->expectException(InvalidProjectNameException::class);
        $project = new Project(Uuid::uuid4(), $name, 'App', new \DateTimeImmutable());
    }

    public function invalidProjectNamesDataProvider(): array
    {
        return [['', 'Inva', 'It is not the best name for project cause it is to long']];
    }

    public function testShouldChangeProjectName(): void
    {
        $project = self::createValidProject();
        $project->changeName('Web Managment Application');

        Assert::assertInstanceOf(\DateTimeInterface::class, $project->getUpdatedAt());
        Assert::assertEquals('Web Managment Application', $project->getName());
    }

    /**
     * @dataProvider invalidProjectNamesDataProvider
     */
    public function testShouldThrowExceptionWhileChangingProjectName($name): void
    {
        $this->expectException(InvalidProjectNameException::class);
        $project = self::createValidProject();
        $project->changeName($name);
    }

    private static function createValidProject(): Project
    {
        return new Project(Uuid::uuid4(), 'Web Application', 'WEBAPP', new \DateTimeImmutable());
    }
}