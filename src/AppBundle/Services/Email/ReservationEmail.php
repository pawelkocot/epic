<?php

namespace AppBundle\Services\Email;

use AppBundle\Entity\Attachment;
use AppBundle\Entity\Reservation;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use \Swift_Mailer as Mailer;

class ReservationEmail
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var EngineInterface
     */
    private $engine;

    public function __construct(Mailer $mailer, EngineInterface $engine)
    {
        $this->mailer = $mailer;
        $this->engine = $engine;
    }

    /**
     * @param Reservation $reservation
     */
    public function send(Reservation $reservation)
    {
        /** @var \Swift_Message $message */
        $message = \Swift_Message::newInstance()
            ->setSubject(sprintf('Epic Time - Rezerwacja - %s', $reservation->getEvent()->getName()))
            ->setFrom('zaklep@epictime.pl')
            ->setTo($reservation->getEmail())
            ->setBody(
                $this->engine->render(
                    '@App/Email/reservation.html.twig',
                    array('reservation' => $reservation)
                ),
                'text/html'
            );

        foreach ($reservation->getEvent()->getAttachments() as $attachment) {
            /** @var Attachment $attachment */
            $message->attach(\Swift_Attachment::fromPath($attachment->getFilePath()));
        }

        $this->mailer->send($message);
    }
}