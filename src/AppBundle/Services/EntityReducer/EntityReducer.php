<?php

namespace AppBundle\Services\EntityReducer;

use AppBundle\Entity\Attachment;
use AppBundle\Entity\Event;
use AppBundle\Entity\EventGroup;
use AppBundle\Entity\Reservation;
use AppBundle\Services\FileUploader\EventAttachmentFileUploader;

class EntityReducer
{
//    /**
//     * @var EventAttachmentFileUploader
//     */
//    private $eventAttachmentFileUploader;
//
//    public function __construct(EventAttachmentFileUploader $eventAttachmentFileUploader)
//    {
//        $this->eventAttachmentFileUploader = $eventAttachmentFileUploader;
//    }

    /**
     * @param $entity
     * @return array
     * @throws \Exception
     */
    public function reduceEntity($entity)
    {
        if (is_array($entity)) {
            return array_map(
                function ($entity) {
                    return $this->reduceEntity($entity);
                },
                $entity
            );
        }

        if ($entity instanceof Event) {
            return array(
                'id' => $entity->getId(),
                'groupId' => $entity->getEventGroup()->getId(),
                'groupName' => $entity->getEventGroup()->getName(),
                'name' => $entity->getName(),
                'price' => $entity->getPrice(),
                'reservations' => array_map([$this, 'reduceEntity'], $entity->getReservations()->toArray()),
                'attachments' => array_map([$this, 'reduceEntity'], $entity->getAttachments()->toArray()),
            );
        }

        if ($entity instanceof EventGroup) {
            return array(
                'id' => $entity->getId(),
                'name' => $entity->getName()
            );
        }

        if ($entity instanceof Attachment) {
            return array(
                'id' => $entity->getId(),
                'fileName' => $entity->getFileName(),
                'filePath' => $entity->getFilePath(),
//                'path' => $this->eventAttachmentFileUploader->getFilePath($entity),
            );
        }

        if ($entity instanceof Reservation) {
            return array(
                'id' => $entity->getId(),
                'createdAt' => $entity->getCreatedAt(),
                'firstName' => $entity->getFirstName(),
                'lastName' => $entity->getLastName(),
                'email' => $entity->getEmail(),
                'phone' => $entity->getPhone(),
                'birthDate' => $entity->getBirthDate(),
                'insureResign' => $entity->getInsureResign(),
                'insureExtra' => $entity->getInsureExtra(),
                'transport' => $entity->getTransport(),
                'reference' => $entity->getReference(),
                'comment' => $entity->getComment(),
            );
        }

        throw new \Exception(sprintf('Unknown entity %s', get_class($entity)));
    }
}