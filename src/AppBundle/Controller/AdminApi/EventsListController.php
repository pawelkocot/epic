<?php

namespace AppBundle\Controller\AdminApi;

use AppBundle\Model\Event\EventsListModel;
use AppBundle\Services\Response\ResponseCreator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route(service="controller.admin_api.events_list")
 */
class EventsListController
{
    /**
     * @var EventsListModel
     */
    private $eventsListModel;

    /**
     * @var ResponseCreator
     */
    private $responseCreator;

    public function __construct(EventsListModel $eventsListModel, ResponseCreator $responseCreator)
    {
        $this->eventsListModel = $eventsListModel;
        $this->responseCreator = $responseCreator;
    }

    /**
     * @Route("/events")
     * @Method({"GET"})
     *
     * @return JsonResponse
     */
    public function indexAction()
    {
        return $this->responseCreator->jsonFromEntity($this->eventsListModel->getAllEvents());
    }
}