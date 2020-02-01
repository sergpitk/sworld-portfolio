<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ItemsController
 * @package App\Controller
 * @Route("/api/v1/documents")
 */
class DocumentsController extends AbstractController
{
    /**
     * @Route("/{document}", name="document-get", methods={"GET", "HEAD"} )
     * @param $document
     * @return JsonResponse
     */
    public function documentGetHead($document)
    {
        return $this->json([
            'controller_name' => 'DocumentsController',
            'methods_name' => 'documentGetHead',
            'document' => $document
        ]);
    }


    /**
     * @Route("/{document}", name="document-delete", methods={"DELETE"} )
     * @param $document
     * @return JsonResponse
     */
    public function documentDelete($document)
    {
        return $this->json([
            'controller_name' => 'DocumentsController',
            'methods_name' => 'documentDelete',
            'document' => $document
        ]);
    }

    /**
     * @Route("/", name="documents", methods={"GET", "HEAD", "POST"} )
     * @return JsonResponse
     */
    public function documentsGetHeadPost()
    {
        return $this->json([
            'controller_name' => 'DocumentsController',
            'methods_name' => 'documentsGetHeadPost'
        ]);
    }


}
