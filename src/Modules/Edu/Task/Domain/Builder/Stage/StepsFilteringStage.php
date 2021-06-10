<?php

namespace App\Modules\Edu\Task\Domain\Builder\Stage;

use App\Packages\Integration\ContentModuleApi;

class StepsFilteringStage
{
    private $contentModuleApi;

    public function __construct(ContentModuleApi $contentModuleApi)
    {
        $this->contentModuleApi = $contentModuleApi;
    }

    public function filter(int $workbookId, array $stepUuids): array
    {
        $workbookUgcStepUuids = $this->contentModuleApi->getUgcStepUuidsByWorkbook($workbookId);
        $stepUuids = array_values(
            array_unique(
                array_filter(
                    $stepUuids,
                    static function ($stepUuid) use (
                        $workbookUgcStepUuids
                    ) {
                        return !in_array($stepUuid, $workbookUgcStepUuids, true);
                    }
                )
            )
        );

        return $stepUuids;
    }
}