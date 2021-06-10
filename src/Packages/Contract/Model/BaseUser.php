<?php

namespace App\Packages\Contract\Model;

class BaseUser
{
    private $id;

    private function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public static function createFrom(int $id)
    {
        return new BaseUser($id);
    }
}