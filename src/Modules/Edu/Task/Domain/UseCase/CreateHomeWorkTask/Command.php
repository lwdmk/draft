<?php

namespace App\Modules\Edu\Task\Domain\UseCase\CreateHomeWorkTask;


use App\Modules\Edu\Task\Domain\Model\HomeWorkTaskConfig;
use App\Packages\Contract\Model\BaseUser;

class Command
{
    /**
     * @var array
     */
    private $stepUuids;

    /**
     * @var HomeWorkTaskConfig
     */
    private $taskConfig;

    /**
     * @var int|null
     */
    private $workbookId;

    /**
     * @var array
     */
    private $userAgent;

    /**
     * @var string
     */
    private $title;

    /**
     * @var BaseUser
     */
    private $creator;


    protected function getSafeFields(): array
    {
        return ['stepUuids', 'meta', 'workbookId', 'userAgent', 'title'];
    }

    protected function getSafeFieldTypes(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function getStepUuids(): array
    {
        return $this->stepUuids;
    }

    /**
     * @return HomeWorkTaskConfig
     */
    public function getTaskConfig(): HomeWorkTaskConfig
    {
        return $this->taskConfig;
    }

    /**
     * @return int|null
     */
    public function getWorkbookId(): ?int
    {
        return $this->workbookId;
    }

    /**
     * @return array
     */
    public function getUserAgent(): array
    {
        return $this->userAgent;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return BaseUser
     */
    public function getCreator(): BaseUser
    {
        return $this->creator;
    }

    /**
     * @param BaseUser $creator
     */
    public function setCreator(BaseUser $creator): void
    {
        $this->creator = $creator;
    }
}
