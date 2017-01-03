<?php

namespace AppBundle\Controller\Api;

use AppBundle\Model\Event\CreateEventModel;
use AppBundle\Model\Event\EventsListModel;
use AppBundle\Services\Response\ResponseCreator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route(service="controller.api.events_list")
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
     * @Security("has_role('ROLE_ADMIN')")
     *
     * @return JsonResponse
     */
    public function indexAction()
    {
        return $this->responseCreator->jsonFromEntity($this->eventsListModel->getAllEvents());
    }
}