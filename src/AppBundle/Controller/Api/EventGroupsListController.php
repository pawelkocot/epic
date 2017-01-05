<?php

namespace AppBundle\Controller\Api;

use AppBundle\Model\EventGroup\EventGroupModel;
use AppBundle\Services\Response\ResponseCreator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route(service="controller.api.event_groups_list")
 */
class EventGroupsListController
{
    /**
     * @var EventGroupModel
     */
    private $eventGroupModel;

    /**
     * @var ResponseCreator
     */
    private $responseCreator;

    public function __construct(EventGroupModel $eventGroupModel, ResponseCreator $responseCreator)
    {
        $this->eventGroupModel = $eventGroupModel;
        $this->responseCreator = $responseCreator;
    }

    /**
     * @Route("/eventGroups")
     * @Method({"GET"})
     * @Security("has_role('ROLE_ADMIN')")
     *
     * @return JsonResponse
     */
    public function indexAction()
    {
        return $this->responseCreator->jsonFromEntity($this->eventGroupModel->getAll());
    }
}