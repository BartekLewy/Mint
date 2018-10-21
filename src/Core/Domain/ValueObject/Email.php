<?php
declare(use_strict=1);

namespace App\Core\Domain\ValueObject;

class Email
{
    private $email;

    public function __construct(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('This value is not valid email: ' . $email);
        }
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}