<?php

namespace App\Modules\Edu\Task\UI\Http\Controller\v1;

use App\Modules\Edu\Task\Domain\UseCase;
use App\Modules\Edu\Task\UI\Http\Controller\v1\Output\TaskCreateResponse;
use App\Modules\Edu\Task\UI\Message\TaskCreated;
use App\Packages\Contract\Message\MessageContext;
use App\Packages\Contract\Model\BaseUser;
use App\Packages\Helper\Traits\ErrorResponseTrait;
use App\Packages\Util\AuthenticatedUserFetcher;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface as ValidationErrors;

/**
 * @Rest\Route("/api/v1")
 */
class TaskController extends AbstractFOSRestController
{
    use ErrorResponseTrait;

    public function createAction(
        UseCase\CreateHomeWorkTask\Command $command,
        UseCase\CreateHomeWorkTask\Handler $handler,
        ValidationErrors $validationErrors,
        AuthenticatedUserFetcher $authenticatedUserFetcher,
        MessageBusInterface $bus
    ): View {
        if ($validationErrors->count()) {
            return $this->createValidationErrorResponse(Response::HTTP_BAD_REQUEST, $validationErrors);
        }
        $command->setCreator(BaseUser::createFrom($authenticatedUserFetcher->getUser()->getUserId()));
        $task = $handler->handle($command);
        $bus->dispatch(
            (new TaskCreated($task))->setContext(
                MessageContext::createFromData(
                    [
                        'userAgent' => $command->getUserAgent()
                    ]
                )
            )
        );

        return View::create(new TaskCreateResponse($task));
    }
}
