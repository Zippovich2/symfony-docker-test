<?php

namespace App\Security;

use Lexik\Bundle\JWTAuthenticationBundle\Security\User\JWTUserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

final class User implements JWTUserInterface, PasswordAuthenticatedUserInterface
{
    private array $roles;
    private string $username;
    private string $email;

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    public function __construct($username, array $roles = ['ROLE_USER'], $email)
    {
        $this->username = $username;
        $this->roles = $roles;
        $this->email = $email;
    }

    public static function createFromPayload($username, array $payload)
    {
        return new self(
            $username,
            $payload['roles'] ?? ['ROLE_USER'], // Added by default
            $payload['email'] ?? 'test@test.com'  // Custom
        );
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getUserIdentifier(): string
    {
        return $this->email;
    }

    public function getPassword(): ?string
    {
        return 'test';
    }
}