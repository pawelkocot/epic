<?php

namespace AppBundle\Model\Reservations;

use AppBundle\Entity\Event;
use AppBundle\Entity\Reservation;
use AppBundle\Exception\ValidationException;
use AppBundle\Repository\EventRepository;
use AppBundle\Repository\ReservationRepository;
use AppBundle\Services\Email\ReservationEmail;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CreateReservationModel
{
    /**
     * @var EventRepository
     */
    private $eventRepository;

    /**
     * @var ReservationRepository
     */
    private $reservationRepository;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * @var ReservationEmail
     */
    private $reservationEmail;

    public function __construct(
        ReservationRepository $reservationRepository,
        EventRepository $eventRepository,
        ValidatorInterface $validator,
        ReservationEmail $reservationEmail)
    {
        $this->eventRepository = $eventRepository;
        $this->reservationRepository = $reservationRepository;
        $this->validator = $validator;
        $this->reservationEmail = $reservationEmail;
    }

    public function create($data)
    {
        $event = $this->eventRepository->find(isset($data['eventId']) ? $data['eventId'] : null);
        if (!$event instanceof Event) {
            throw new \Exception('Event not found');
        }

        $reservation = new Reservation();
        $reservation->setEvent($event);
        $reservation->setCreatedAt(date('Y-m-d H:i:s'));
        $reservation->setFirstName(isset($data['firstName']) ? $data['firstName'] : null);
        $reservation->setLastName(isset($data['lastName']) ? $data['lastName'] : null);
        $reservation->setEmail(isset($data['email']) ? $data['email'] : null);
        $reservation->setPhone(isset($data['phone']) ? $data['phone'] : null);
        $reservation->setBirthDate(isset($data['birthDate']) ? $data['birthDate'] : null);
        $reservation->setInsureResign(isset($data['insureResign']) ? $data['insureResign'] : null);
        $reservation->setInsureExtra(isset($data['insureExtra']) ? $data['insureExtra'] : null);
        $reservation->setTransport(isset($data['transport']) ? $data['transport'] : null);
        $reservation->setReference(isset($data['reference']) ? $data['reference'] : null);
        $reservation->setComment(isset($data['comment']) ? $data['comment'] : null);

        $errors = $this->validator->validate($reservation);
        if (count($errors)) {
            throw new ValidationException($errors);
        }

        $conn = $this->reservationRepository->getConnection();

        $conn->beginTransaction(); // suspend auto-commit
        try {
            $this->reservationRepository->saveEntity($reservation);
            $this->reservationEmail->send($reservation);

            $conn->commit();
        } catch (\Exception $e) {
            $conn->rollBack();

            throw $e;
        }
    }
}