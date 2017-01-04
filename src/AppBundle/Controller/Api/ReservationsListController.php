<?php

namespace AppBundle\Controller\Api;

use AppBundle\Model\Reservations\ReservationsListModel;
use AppBundle\Services\Response\ResponseCreator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
/**
 * @Route(service="controller.api.reservations_list")
 */
class ReservationsListController
{
    /**
     * @var ReservationsListModel
     */
    private $reservationsListModel;

    /**
     * @var ResponseCreator
     */
    private $responseCreator;

    public function __construct(ReservationsListModel $reservationsListModel, ResponseCreator $responseCreator)
    {
        $this->reservationsListModel = $reservationsListModel;
        $this->responseCreator = $responseCreator;
    }

    /**
     * @Route("/reservations/{eventId}")
     * @Method({"GET"})
     * @Security("has_role('ROLE_ADMIN')")
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function indexAction(Request $request)
    {
        return $this->responseCreator->jsonFromEntity(
            $this->reservationsListModel->getForEvent($request->get('eventId'))
        );
    }
}