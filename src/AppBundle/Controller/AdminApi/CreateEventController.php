<?php

namespace AppBundle\Controller\AdminApi;

use AppBundle\Model\Event\CreateEventModel;
use AppBundle\Model\EventGroup\EventGroupModel;
use AppBundle\Services\Response\ResponseCreator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route(service="controller.admin_api.create_event")
 */
class CreateEventController
{
    /**
     * @var CreateEventModel
     */
    private $createEvent;

    /**
     * @var EventGroupModel
     */
    private $eventGroupModel;

    /**
     * @var ResponseCreator
     */
    private $responseCreator;

    public function __construct(
        CreateEventModel $createEvent,
        EventGroupModel $eventGroupModel,
        ResponseCreator $responseCreator)
    {
        $this->createEvent = $createEvent;
        $this->eventGroupModel = $eventGroupModel;
        $this->responseCreator = $responseCreator;
    }

    /**
     * @Route("/createEvent")
     * @Method({"POST"})
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function indexAction(Request $request)
    {
        try {
            $data = json_decode($request->getContent(), true);

            $eventGroup = $this->eventGroupModel->findOrCreate(
                isset($data['eventGroupId']) ? $data['eventGroupId'] : null,
                isset($data['group']) ? $data['group'] : null
            );

            $price = isset($data['price']) ? $data['price'] : null;
            $event = $this->createEvent->create($data['name'], $eventGroup, $price);

            return $this->responseCreator->jsonFromEntity($event);
        }
        catch (\Exception $e) {
            return new JsonResponse($e->getMessage(), 400);
        }
    }
}