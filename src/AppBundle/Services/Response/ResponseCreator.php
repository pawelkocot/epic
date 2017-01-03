<?php

namespace AppBundle\Services\Response;

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
        return JsonResponse::fromJsonString($this->serializer->serialize(
            $entity,
            'json'
        ));
    }
}