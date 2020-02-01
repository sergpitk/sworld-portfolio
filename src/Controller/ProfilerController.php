<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class ProfilerController extends AbstractController
{
    /**
     * @Route("/{profiler}", name="profiler-id", methods={"GET", "HEAD"})
     * @param $profiler
     * @return RedirectResponse
     */
    public function getProfilerById($profiler)
    {
        return $this->getProfiler($profiler);
    }

    /**
     * @Route("/", name="profiler", methods={"GET", "HEAD"})
     */
    public function getProfilerList()
    {
        return $this->getProfiler();
    }


    /**
     * @return RedirectResponse
     * @param $slug
     */
    protected function getProfiler($slug = '') {
        return $this->redirect("_profiler/".$slug, 301);
    }
}
