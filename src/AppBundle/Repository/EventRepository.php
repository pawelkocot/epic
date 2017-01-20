<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Event;
use Doctrine\ORM\EntityRepository;

class EventRepository extends EntityRepository
{
    /**
     * @param Event $event
     * @param bool $flush
     */
    public function saveEntity($event, $flush = true)
    {
        $this->_em->persist($event);

        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public function getManager()
    {
        return $this->getEntityManager();
    }

    /**
     * @return \Doctrine\DBAL\Connection
     */
    public function getConnection()
    {
        return $this->getEntityManager()->getConnection();
    }
}