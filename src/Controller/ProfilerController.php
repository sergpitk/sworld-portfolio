<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProfilerController extends AbstractController
{
    /**
     * @Route("/profiler", name="profiler")
     */
    public function index()
    {
        return $this->render('profiler/index.html.twig', [
            'controller_name' => 'ProfilerController',
        ]);
    }
}
