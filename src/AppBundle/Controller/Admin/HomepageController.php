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
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        return [];
    }
}
