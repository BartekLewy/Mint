<?php
declare (strict_types = 1);

namespace App\Tests\Core\Application;

use App\Core\Application\ProjectService;
use App\Core\Application\Command\CreateProjectCommand;
use App\Core\Application\DTO\ProjectDTO;
use App\Core\Domain\Repository\ProjectRepository;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;
use App\Core\Domain\Project;

class ProjectServiceTest extends TestCase
{
    /** @var ProjectService */
    private $systemUnderTest;

    /** @var ProjectRepository|MockObject */
    private $projectRepositoryMock;

    public function setUp()
    {
        $this->projectRepositoryMock = $this->createMock(ProjectRepository::class);
        $this->systemUnderTest = new ProjectService($this->projectRepositoryMock);
    }

    public function testShouldCreateProjectFromCommand()
    {
        $projectDTO = $this->systemUnderTest->create(new CreateProjectCommand('Project Name', 'SHORT'));

        Assert::assertEquals('Project Name', $projectDTO->getName());
        Assert::assertEquals('SHORT', $projectDTO->getShortcut());
        Assert::assertInstanceOf(\DateTimeInterface::class, $projectDTO->getId());
        Assert::assertInstanceOf(\DateTimeInterface::class, $projectDTO->getCreatedAt());
    }
}