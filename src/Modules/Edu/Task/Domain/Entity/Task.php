<?php


namespace App\Modules\Edu\Task\Domain\Entity;


use App\Packages\Contract\Model\BaseUser;

class Task
{
    private $id;
    private $hash;
    private $config;
    private $creator;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return $this->config;
    }

    public function getCreator(): BaseUser
    {
        return $this->creator;
    }

    public function getHash(): string
    {
        return $this->hash;
    }
}