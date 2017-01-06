<?php

namespace AppBundle\Services\Response;

use AppBundle\Entity\Event;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;

class ResponseCreator
{
    /**
     * @var Serializer
     */
    private $serializer;

    public function __construct(Serializer $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param $entity
     * @return JsonResponse
     */
    public function jsonFromEntity($entity)
    {
        $entity = $this->reduceEntity($entity);

        return JsonResponse::fromJsonString($this->serializer->serialize(
            $entity,
            'json'
        ));
    }

    /**
     * @param $entity
     * @return mixed
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
            );
        }

        return $entity;
    }
}