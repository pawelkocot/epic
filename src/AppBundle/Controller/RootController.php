<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class RootController
{
    /**
     *
     * @Route("/", name="root")
     */
    public function indexAction()
    {
        return new Response('root');
    }
}