<?php

namespace App\Modules\Edu\Task\UI\Message;

use App\Modules\Edu\Task\Domain\Entity\Task;
use App\Packages\Contract\Message\AbstractCrossModuleMessage;
use App\Packages\Contract\Message\MessageContext;
use App\Packages\Contract\Model\BaseUser;

class TaskCreated extends AbstractCrossModuleMessage
{
    private $baseUser;
    private $context;
    private $task;

    public function __construct(Task $task, ?BaseUser $baseUser = null)
    {
        $this->task = $task;
        $this->baseUser = $baseUser ?: $task->getCreator();
    }

    public function getInitiatorUser(): ?BaseUser
    {
        return $this->baseUser;
    }

    public function getContext(): ?MessageContext
    {
        return $this->context;
    }

    /**
     * @param MessageContext $context
     * @return TaskCreated
     */
    public function setContext(MessageContext $context): self
    {
        $this->context = $context;

        return $this;
    }

    public function getPayload(): array
    {
        return [
            'task' => $this->task,
        ];
    }
}