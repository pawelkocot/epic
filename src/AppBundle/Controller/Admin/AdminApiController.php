<?php

namespace AppBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class AdminApiController extends Controller
{
    /**
     *
     * @Route("/admin/api/createEvent")
     */
    public function createEventAction(Request $request)
    {
        return new JsonResponse(['success' => true]);
    }
}