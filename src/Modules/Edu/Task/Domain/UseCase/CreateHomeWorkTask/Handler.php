<?php

namespace App\Modules\Edu\Task\Domain\UseCase\CreateHomeWorkTask;

use App\Modules\Edu\Task\Domain\Builder\TaskConfigBuilder;
use App\Modules\Edu\Task\Domain\Entity\Task;
use App\Modules\Edu\Task\Domain\Message\TaskHasBeenCreatedByCommand;
use App\Modules\Edu\Task\Infrastructure\Repository\TaskRepository;
use Symfony\Component\Messenger\MessageBusInterface;

class Handler
{
    private $bus;

    /** @var TaskConfigBuilder */
    private $builder;

    /** @var TaskRepository */
    private $taskRepository;

    public function __construct(MessageBusInterface $bus, TaskConfigBuilder $builder, TaskRepository $taskRepository)
    {
        $this->bus = $bus;
        $this->builder = $builder;
        $this->taskRepository = $taskRepository;
    }

    public function handle(Command $command): Task
    {
        $taskConfig = $this->builder->buildForHomeWorkTask($command);
        $task = new Task($command->getCreator(), $command->getTitle(), $taskConfig);
        $this->taskRepository->save($task);
        $this->bus->dispatch(new TaskHasBeenCreatedByCommand($task, $command));

        return $task;
    }
}
