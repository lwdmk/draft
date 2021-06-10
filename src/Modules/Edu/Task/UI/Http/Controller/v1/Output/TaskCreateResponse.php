<?php

namespace App\Modules\Edu\Task\UI\Http\Controller\v1\Output;

use App\Modules\Edu\Task\Domain\Entity\Task;

final class TaskCreateResponse
{
    private $hash;

    public function __construct(Task $task)
    {
        $this->hash = $task->getHash();
    }

    public function getHash(): string
    {
        return $this->hash;
    }
}
