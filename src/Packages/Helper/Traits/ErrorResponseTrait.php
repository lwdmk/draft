<?php

namespace App\Packages\Helper\Traits;

use FOS\RestBundle\View\View;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface as ValidationErrors;

trait ErrorResponseTrait
{
    private function createErrorResponse(
        int $code,
        string $propertyPath,
        string $message,
        ?string $errorCode = null
    ): View {
        return View::create(new ErrorResponse(new Error($propertyPath, $message, $errorCode)), $code);
    }

    private function createValidationErrorResponse(int $code, ValidationErrors $validationErrors): View
    {
        $errors = [];
        /** @var ConstraintViolationInterface $error */
        foreach ($validationErrors as $error) {
            $errorCodePostfix = ErrorCodesPostfixDictionary::mapToPostfix($error->getCode());
            /** @var ConstraintViolationInterface $error */
            $errors[] = new Error(
                $error->getPropertyPath(),
                $error->getMessage(),
                $errorCodePostfix ? $error->getPropertyPath() . $errorCodePostfix : null,
            );
        }
        return View::create(new ErrorResponse(...$errors), $code);
    }
}
