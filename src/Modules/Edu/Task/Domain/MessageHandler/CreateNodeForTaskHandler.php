<?php

namespace App\Modules\Edu\Task\Domain\MessageHandler;

use App\Modules\Edu\Task\Domain\Message\NodeForTaskHasBeenCreated;
use App\Modules\Edu\Task\Domain\Message\TaskHasBeenCreatedByCommand;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class CreateNodeForTaskHandler implements MessageHandlerInterface
{
    /** @var MessageBusInterface */
    private $bus;

    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;
    }

    public function __invoke(TaskHasBeenCreatedByCommand $taskHasBeenCreatedByCommand)
    {
        $this->bus->dispatch(new NodeForTaskHasBeenCreated());
    }
}