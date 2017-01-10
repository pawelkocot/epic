<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Reservation;
use Doctrine\ORM\EntityRepository;

class ReservationRepository extends EntityRepository
{
    /**
     * @param Reservation $reservation
     * @param bool $flush
     */
    public function saveEntity($reservation, $flush = true)
    {
        $this->_em->persist($reservation);

        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @return \Doctrine\DBAL\Connection
     */
    public function getConnection()
    {
        return $this->getEntityManager()->getConnection();
    }
}