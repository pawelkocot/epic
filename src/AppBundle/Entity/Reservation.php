<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReservationRepository")
 */
class Reservation
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Event", inversedBy="reservations")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id", nullable=false)
     */
    private $event;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Type("string")
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Type("string")
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Type("string")
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=25, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\DateTime(format="d/m/Y")
     */
    private $birthDate;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Assert\Type("boolean")
     */
    private $insureResign;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Assert\Type("boolean")
     */
    private $insureExtra;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Assert\Type("boolean")
     */
    private $transport;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Type("string")
     */
    private $reference;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Type("string")
     */
    private $comment;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param Event $event
     */
    public function setEvent($event)
    {
        $this->event = $event;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param string $birthDate
     */
    public function setBirthDate($birthDate)
    {
//        $birthDate = date("Y-m-d", strtotime($birthDate));

        $this->birthDate = $birthDate;
    }

    /**
     * @return boolean
     */
    public function getInsureResign()
    {
        return $this->insureResign;
    }

    /**
     * @param boolean $insureResign
     */
    public function setInsureResign($insureResign)
    {
        $this->insureResign = $insureResign;
    }

    /**
     * @return boolean
     */
    public function getInsureExtra()
    {
        return $this->insureExtra;
    }

    /**
     * @param boolean $insureExtra
     */
    public function setInsureExtra($insureExtra)
    {
        $this->insureExtra = $insureExtra;
    }

    /**
     * @return boolean
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     * @param boolean $transport
     */
    public function setTransport($transport)
    {
        $this->transport = $transport;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }
}