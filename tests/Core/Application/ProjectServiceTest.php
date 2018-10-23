<?php
declare (strict_types = 1);

namespace App\Tests\Core\Application;

use App\Core\Application\ProjectService;
use App\Core\Application\Command\CreateProjectCommand;
use App\Core\Application\DTO\ProjectDTO;
use App\Core\Domain\Project;
use App\Core\Domain\Event\ProjectWasCreated;
use App\Core\Domain\Exception\DuplicateDetectedException;
use App\Core\Domain\Repository\ProjectReadRepository;
use App\Core\Domain\Repository\ProjectWriteRepository;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;
use Ramsey\Uuid\Uuid;

class ProjectServiceTest extends TestCase
{
    /** @var ProjectService */
    private $systemUnderTest;

    /** @var ProjectWriteRepository|MockObject */
    private $projectWriteRepositoryMock;

    /** @var ProjectReadRepository|MockObject */
    private $projectReadRepositoryMock;

    public function setUp()
    {
        $this->projectWriteRepositoryMock = $this->createMock(ProjectWriteRepository::class);
        $this->projectReadRepositoryMock = $this->createMock(ProjectReadRepository::class);
        $this->systemUnderTest = new ProjectService(
            $this->projectWriteRepositoryMock,
            $this->projectReadRepositoryMock
        );
    }

    public function testShouldCreateProjectFromDTO()
    {
        $this->projectReadRepositoryMock->method('exists')->willReturn(false);
        $projectWasCrated = $this->systemUnderTest->create(new ProjectDTO('Project Name', 'SHORT'));

        Assert::assertInstanceOf(ProjectWasCreated::class, $projectWasCrated);
    }

    public function testShouldThrowDuplicateDetected()
    {
        $this->expectException(DuplicateDetectedException::class);

        $this->projectReadRepositoryMock->method('exists')->willReturn(true);
        $this->systemUnderTest->create(new ProjectDTO('Project Name', 'SHORT'));
    }
}