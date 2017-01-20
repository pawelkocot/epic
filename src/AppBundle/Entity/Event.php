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
     * @ORM\Column(name="`price`", type="string", length=30, nullable=true)
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Reservation", mappedBy="event")
     */
    private $reservations;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Attachment", mappedBy="event")
     */
    private $attachments;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        $this->attachments = new ArrayCollection();
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
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return ArrayCollection
     */
    public function getReservations()
    {
        return $this->reservations;
    }

    /**
     * @return ArrayCollection
     */
    public function getAttachments()
    {
        return $this->attachments;
    }
}