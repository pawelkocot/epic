<?php

namespace AppBundle\Controller\Api;

use AppBundle\Services\Response\ResponseCreator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route(service="controller.api.register")
 */
class RegisterController
{
    /**
     * @var ResponseCreator
     */
    private $responseCreator;

    public function __construct(ResponseCreator $responseCreator)
    {
        $this->responseCreator = $responseCreator;
    }

    /**
     * @Route("/register")
     * @Method({"GET"})
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function indexAction(Request $request)
    {
        return new JsonResponse(['register' => true]);
    }
}