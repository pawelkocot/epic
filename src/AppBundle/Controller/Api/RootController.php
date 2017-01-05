<?php

namespace AppBundle\Controller\Api;

use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * controller only for generate root route for js client
 */
class RootController
{
    /**
     * @Route("/", name="api_root")
     * @Method({"GET"})
     *
     * @return JsonResponse
     */
    public function indexAction()
    {
        return new JsonResponse(array('success' => true));
    }
}