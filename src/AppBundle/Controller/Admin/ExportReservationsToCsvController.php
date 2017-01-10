<?php

namespace AppBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;

class ExportReservationsToCsvController extends Controller
{
    /**
     *
     * @Route("/csv/{eventId}")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function indexAction($eventId)
    {
        $event = $this->get('repository.event')->find($eventId);
        if (!$event) {
            return $this->redirectToRoute('admin_homepage');
        }

        $reservations = $this->get('model.reservations.list')->getForEvent($event);

        if (count($reservations) == 0) {
            return $this->redirectToRoute('admin_homepage');
        }

        $csv = $this->get('reservations_to_csv')->export($reservations);

        $response = new Response($csv);
        $response->headers->set('Content-Type', 'application/csv');
        $response->headers->set('Content-Disposition', sprintf('attachment; filename="events_%s.csv"', $event->getId()));

        return $response;
    }
}