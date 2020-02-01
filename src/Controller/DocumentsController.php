<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ItemsController
 * @package App\Controller
 * @Route("/api/v1")
 */
class DocumentsController extends AbstractController
{
    /**
     * @Route("/documents", name="documents", methods={"GET", "HEAD"} )
     */
    public function documentsGet()
    {
        return $this->render('documents/index.html.twig', [
            'controller_name' => 'DocumentsController',
        ]);
    }

    /**
     * @Route("/documents", name="documents", methods={"POST"} )
     */
    public function documentsPost()
    {
        return $this->render('documents/index.html.twig', [
            'controller_name' => 'DocumentsController',
        ]);
    }
}
