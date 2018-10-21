<?php
declare(strict_types=1);

namespace App\Core\Domain;

use Ramsey\Uuid\UuidInterface;

class Status
{
    /** @var UuidInterface */
    private $id;

    /** @var string */
    private $key;

    public function __construct(UuidInterface $id, string $key)
    {
        $this->id = $id;
        $this->key = $key;
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getKey(): string
    {
        return $this->key;
    }
}