<?php

namespace AppBundle\Controller\AdminApi;

use AppBundle\Entity\Event;
use AppBundle\Repository\EventRepository;
use AppBundle\Services\FileUploader\EventAttachmentFileUploader;
use AppBundle\Services\Response\ResponseCreator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route(service="controller.admin_api.upload_attachment")
 */
class UploadAttachmentController
{
    /**
     * @var EventRepository
     */
    private $eventRepository;

    /**
     * @var ResponseCreator
     */
    private $responseCreator;

    /**
     * @var EventAttachmentFileUploader
     */
    private $eventAttachmentFileUploader;

    public function __construct(EventRepository $eventRepository, EventAttachmentFileUploader $eventAttachmentFileUploader, ResponseCreator $responseCreator)
    {
        $this->eventRepository = $eventRepository;
        $this->responseCreator = $responseCreator;
        $this->eventAttachmentFileUploader = $eventAttachmentFileUploader;
    }

    /**
     * @Route("/uploadAttachment/{eventId}")
     * @Method({"POST"})
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function indexAction(Request $request)
    {
//        throw new \Exception('dasdas');
        /** @var Event $event */
        $event = $this->eventRepository->find($request->get('eventId'));

        if (!$event) {
            return new JsonResponse('Event not found', 404);
        }

        $this->eventAttachmentFileUploader->upload($event, $request->files->get('attachment'));

        return $this->responseCreator->jsonFromEntity($event);
    }
}