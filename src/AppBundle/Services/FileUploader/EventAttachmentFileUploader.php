<?php

namespace AppBundle\Services\FileUploader;

use AppBundle\Entity\Attachment;
use AppBundle\Entity\Event;
use AppBundle\Repository\EventRepository;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class EventAttachmentFileUploader
{
    /**
     * @var string
     */
    private $targetDir;

    /**
     * @var EventRepository
     */
    private $eventRepository;

    public function __construct($targetDir, EventRepository $eventRepository)
    {
        $this->targetDir = $targetDir;
        $this->eventRepository = $eventRepository;
    }

    /**
     * @param Event $event
     * @param UploadedFile $file
     */
    public function upload(Event $event, UploadedFile $file)
    {
        $filePath = $this->getUploadDir($event).$file->getClientOriginalName();

        $file->move($this->getUploadDir($event), $file->getClientOriginalName());

        $attachment = new Attachment();
        $attachment->setFilePath($filePath);
        $attachment->setFileName($file->getClientOriginalName());
        $attachment->setEvent($event);

        $this->eventRepository->getManager()->persist($attachment);
        $this->eventRepository->getManager()->flush();
    }

    /**
     * @param Event $event
     * @return string
     */
    public function getUploadDir(Event $event)
    {
        $target = rtrim($this->targetDir, '/');

        return $target.'/'.$event->getId().'/';
    }

    /**
     * @param Attachment $attachment
     * @return string
     */
    public function getFilePath(Attachment $attachment)
    {
        return $this->getUploadDir($attachment->getEvent()).$attachment->getFilePath();
    }
}