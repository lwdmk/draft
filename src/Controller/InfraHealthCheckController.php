<?php

namespace App\Controller;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * ВАЖНО: НЕ УДАЛЯЙ ЭТОТ КОНТРОЛЛЕР
 * Можно перенести. При этом не забудь изменить настройки healthcheck
 */
class InfraHealthCheckController
{

    /**
     * @Route("/infrastructure/healthcheck", name="infrastructure_healthcheck", methods={"GET"})
     * @return JsonResponse
     */
    public function healthcheck(): JsonResponse
    {
        return new JsonResponse();
    }

    /**
     * @Route("/infrastructure/info", name="infrastructure_info", methods={"GET"})
     * @param ParameterBagInterface $parameterBag
     * @return JsonResponse
     */
    public function info(ParameterBagInterface $parameterBag): JsonResponse
    {
        return new JsonResponse([
            'env' => $parameterBag->get('kernel.environment'),
        ]);
    }
}
