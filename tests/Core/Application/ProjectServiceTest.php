<?php
declare (strict_types = 1);

namespace App\Tests\Core\Application;

use App\Core\Application\ProjectService;
use App\Core\Application\Command\CreateProjectCommand;
use App\Core\Application\DTO\ProjectDTO;
use App\Core\Domain\Repository\ProjectWriteRepository;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;
use App\Core\Domain\Project;
use App\Core\Domain\Event\ProjectWasCreated;

class ProjectServiceTest extends TestCase
{
    /** @var ProjectService */
    private $systemUnderTest;

    /** @var ProjectWriteRepository|MockObject */
    private $projectWriteRepositoryMock;

    public function setUp()
    {
        $this->projectWriteRepositoryMock = $this->createMock(ProjectWriteRepository::class);
        $this->systemUnderTest = new ProjectService($this->projectWriteRepositoryMock);
    }

    public function testShouldCreateProjectFromCommand()
    {
        $projectWasCrated = $this->systemUnderTest->create(new ProjectDTO('Project Name', 'SHORT'));

        Assert::assertInstanceOf(ProjectWasCreated::class, $projectWasCrated);
    }
}