<?php

namespace AppBundle\Controller\Api;

use AppBundle\Model\Event\CreateEventModel;
use AppBundle\Services\Response\ResponseCreator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route(service="controller.api.create_event")
 */
class CreateEventController
{
    /**
     * @var CreateEventModel
     */
    private $createEvent;

    /**
     * @var ResponseCreator
     */
    private $responseCreator;

    public function __construct(CreateEventModel $createEvent, ResponseCreator $responseCreator)
    {
        $this->createEvent = $createEvent;
        $this->responseCreator = $responseCreator;
    }

    /**
     * @Route("/createEvent")
     * @Method({"POST"})
     * @Security("has_role('ROLE_ADMIN')")
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function indexAction(Request $request)
    {
        try {
            $data = json_decode($request->getContent(), true);
            $event = $this->createEvent->create($data['name'], $data['group']);

            return $this->responseCreator->jsonFromEntity($event);
        }
        catch (\Exception $e) {
            return new JsonResponse($e->getMessage(), 400);
        }
    }
}