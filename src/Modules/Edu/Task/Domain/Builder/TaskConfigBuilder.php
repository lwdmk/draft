<?php


namespace App\Modules\Edu\Task\Domain\Builder;


use App\Modules\Edu\Task\Domain\Builder\Stage\StepsFilteringStage;
use App\Modules\Edu\Task\Domain\Model\HomeWorkTaskConfig;
use App\Modules\Edu\Task\Domain\UseCase\CreateHomeWorkTask\Command;

class TaskConfigBuilder
{
    /** @var StepsFilteringStage */
    private $stepsFilteringStage;

    public function __construct(StepsFilteringStage $stepsFilteringStage)
    {
        $this->stepsFilteringStage = $stepsFilteringStage;
    }

    public function buildForHomeWorkTask(Command $command): HomeWorkTaskConfig
    {
        $steps = $command->getStepUuids();
        if ($command->getWorkbookId()) {
            $step = $this->stepsFilteringStage->filter($command->getWorkbookId(), $steps);
        }
        return new HomeWorkTaskConfig();
    }
}