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
     * @Route("/{document}/attachment/previews/{preview}", name="document-get-attachment-previews-preview", methods={"GET", "HEAD"} )
     * @param $document
     * @param $preview
     * @return JsonResponse
     */
    public function documentGetHeadAttachmentPreviewsPreview($document, $preview)
    {
        return $this->json([
            'controller_name'   => 'DocumentsController',
            'methods_name'      => 'documentGetHeadAttachmentPreviewsPreview',
            'document'          => $document,
            'preview'           => $preview
        ]);
    }



    /**
     * @Route("/{document}/attachment/previews", name="document-get-attachment-previews", methods={"GET", "HEAD"} )
     * @param $document
     * @return JsonResponse
     */
    public function documentGetHeadAttachmentPreviews($document)
    {
        return $this->json([
            'controller_name' => 'DocumentsController',
            'methods_name' => 'documentGetHeadAttachmentPreview',
            'document' => $document
        ]);
    }

    /**
     * @Route("/{document}/attachment/upload", name="document-get-attachment-upload-get", methods={"GET", "HEAD"} )
     * @param $document
     * @return JsonResponse
     */
    public function documentGetHeadAttachmentUploadGet($document)
    {
        return $this->json([
            'controller_name' => 'DocumentsController',
            'methods_name' => 'documentGetHeadAttachmentUploadGet',
            'document' => $document
        ]);
    }

    /**
     * @Route("/{document}/attachment/upload", name="document-get-attachment-upload-post", methods={"POST"} )
     * @param $document
     * @return JsonResponse
     */
    public function documentGetHeadAttachmentUploadPost($document)
    {
        return $this->json([
            'controller_name' => 'DocumentsController',
            'methods_name' => 'documentGetHeadAttachmentUploadPost',
            'document' => $document
        ]);
    }


    /**
     * @Route("/{document}/attachment", name="document-get-attachment", methods={"GET", "HEAD"} )
     * @param $document
     * @return JsonResponse
     */
    public function documentGetHeadAttachment($document)
    {
        return $this->json([
            'controller_name' => 'DocumentsController',
            'methods_name' => 'documentGetHeadAttachment',
            'document' => $document
        ]);
    }

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
