<?php

namespace AppBundle\Controller\Api;

use AppBundle\Exception\ValidationException;
use AppBundle\Model\Reservations\CreateReservationModel;
use AppBundle\Services\Email\ReservationEmail;
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
     * @var CreateReservationModel
     */
    private $createReservationModel;

    /**
     * @var ResponseCreator
     */
    private $responseCreator;

    public function __construct(CreateReservationModel $createReservationModel, ResponseCreator $responseCreator) {
        $this->createReservationModel = $createReservationModel;
        $this->responseCreator = $responseCreator;
    }

    /**
     * @Route("/register")
     * @Method({"POST"})
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function indexAction(Request $request)
    {
        try {
            $data = json_decode($request->getContent(), true);

            $this->createReservationModel->create(is_array($data) ? $data : []);

            return new JsonResponse(['register' => true]);
        }
        catch (ValidationException $e) {
            return new JsonResponse($e->getErrorMessages(), 400);
        }
    }

    /**
    {
        "eventId": 1,
        "firstName": "Paweł",
        "lastName": "Kocot",
        "email": "kocot.pawel@gmail.com",
        "phone": "781 296 647",
        "birthDate": "28/07/1984",
        "insureResign": true,
        "insureExtra": true,
        "transport": true,
        "reference": "someone",
        "comment": "comment comment"
    }
     */
}