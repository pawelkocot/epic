<?php

namespace AppBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class HomepageController extends Controller
{
    /**
     *
     * @Route("/admin/", name="admin_homepage")
     * @Template
     */
    public function indexAction(Request $request)
    {
        dump($request);
//        $event = new Event();
//        $event->setName('dasdad');
//
//        $reservation = new Reservation();
//        $reservation->setEvent($event);
//        $reservation->setFirstName('adasdas');
//        $reservation->setLastName('adasdas');
//        $reservation->setEmail('adasdas');
//        $reservation->setPhone('adasdas');
//        $reservation->setBirthDate('adasdas');
//
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($event);
//        $em->persist($reservation);
//        $em->flush();

        return [];
    }
}
