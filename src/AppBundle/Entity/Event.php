<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EventRepository")
 */
class Event
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="EventGroup", cascade={"all"})
     * @ORM\JoinColumn(name="event_group_id", referencedColumnName="id", nullable=false)
     */
    private $eventGroup;

    /**
     * @ORM\Column(name="`name`", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Reservation", mappedBy="event")
     */
    private $reservations;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param EventGroup $eventGroup
     */
    public function setEventGroup(EventGroup $eventGroup)
    {
        $this->eventGroup = $eventGroup;
    }

    /**
     * @return EventGroup
     */
    public function getEventGroup()
    {
        return $this->eventGroup;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return ArrayCollection
     */
    public function getReservations()
    {
        return $this->reservations;
    }
}