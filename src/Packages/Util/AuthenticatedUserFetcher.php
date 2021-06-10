<?php

namespace App\Packages\Util;

use App\Security\User;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

final class AuthenticatedUserFetcher
{
    /** @var TokenStorageInterface */
    private $tokenStorage;

    /** @var AuthorizationCheckerInterface */
    private $authorizationChecker;

    public function __construct(
        TokenStorageInterface $tokenStorage,
        AuthorizationCheckerInterface $authorizationChecker
    ) {
        $this->tokenStorage = $tokenStorage;
        $this->authorizationChecker = $authorizationChecker;
    }

    public function getUser(): User
    {
        if (!$this->hasAuthenticatedUser()) {
            throw new AccessDeniedException();
        }

        return $this->tokenStorage->getToken()->getUser();
    }

    public function hasAuthenticatedUser(): bool
    {
        return $this->tokenStorage->getToken() && $this->tokenStorage->getToken()->getUser() instanceof User;
    }
}
