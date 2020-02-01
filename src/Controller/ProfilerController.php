<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class ProfilerController extends AbstractController
{
    /**
     * @Route("/", name="profiler", methods={"GET", "HEAD"})
     */
    public function index()
    {
        return $this->getProfiler();
    }


    /**
     * @return RedirectResponse
     */
    protected function getProfiler() {
        return $this->redirect('_profiler', 301);
    }
}
