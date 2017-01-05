<?php

namespace AppBundle\Repository;

use AppBundle\Entity\EventGroup;
use Doctrine\ORM\EntityRepository;

class EventGroupRepository extends EntityRepository
{
    /**
     * @param EventGroup $eventGroup
     * @param bool $flush
     */
    public function saveEntity($eventGroup, $flush = true)
    {
        $this->_em->persist($eventGroup);

        if ($flush) {
            $this->_em->flush();
        }
    }
}