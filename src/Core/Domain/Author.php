<?php
declare(strict_types=1);

namespace App\Core\Domain;

use App\Core\Domain\ValueObject\Email;
use Ramsey\Uuid\UuidInterface;

class Author
{
    /** @var UuidInterface */
    private $id;

    /** @var string */
    private $name;

    /** @var Email */
    private $email;

    public function __construct(UuidInterface $id, string $name, Email $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }
}