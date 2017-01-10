<?php

namespace AppBundle\Services\Response;

use AppBundle\Entity\Event;
use AppBundle\Entity\Reservation;
use AppBundle\Services\EntityReducer\EntityReducer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;

class ResponseCreator
{
    /**
     * @var Serializer
     */
    private $serializer;

    public function __construct(Serializer $serializer, EntityReducer $entityReducer)
    {
        $this->serializer = $serializer;
        $this->entityReducer = $entityReducer;
    }

    /**
     * @param $entity
     * @return JsonResponse
     */
    public function jsonFromEntity($entity)
    {
        $entity = $this->entityReducer->reduceEntity($entity);

        return JsonResponse::fromJsonString($this->serializer->serialize(
            $entity,
            'json'
        ));
    }
}