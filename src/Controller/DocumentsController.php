<?php

namespace App\Controller;

use App\Entity\Document;
use App\Form\DocumentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\FileUploader;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
     * @Route("/{document}/attachment/upload", name="document-attachment-upload-post" )
     * @param $document
     * @param Request $request
     * @param FileUploader $fileUploader
//     * @return JsonResponse
     * @return RedirectResponse | Response
     */
    public function documentAttachmentUploadPost($document, Request $request, FileUploader $fileUploader)
    {

        $document = new Document();
        $form = $this->createForm(DocumentType::class, $document);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $pdfFile */
            $pdfFile = $form['pdf']->getData();
            if ($pdfFile) {
                $pdfFileName = $fileUploader->upload($pdfFile);
                $document->setPdfFilename($pdfFileName);

                // Move the file to the directory where pdf are stored
                try {
                    $pdfFile->move(
                        $this->getParameter('pdf_directory'),
                        $pdfFileName
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }
                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $document->setPdfFilename($pdfFileName);
            }

            // ... persist the $product variable or any other work

            return $this->redirect($this->generateUrl('documents-get'));

        }

        return $this->render('documents/new.html.twig', [
            'form' => $form->createView(),
        ]);


        /*return $this->json([
            'controller_name' => 'DocumentsController',
            'methods_name' => 'documentAttachmentUploadPost',
            'document' => $document
        ]);*/
    }


    /**
     * @Route("/{document}/attachment", name="document-attachment-get", methods={"GET", "HEAD"} )
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
     * @Route("/", name="documents-get", methods={"GET", "HEAD", "POST"} )
     * @param int $page
     * @param Request $request
     * @return JsonResponse
     */
    public function documentsGetHeadPost(Request $request, $page = 1)
    {
        $limit = $request->get('limit', 20);
        $repository = $this->getDoctrine()->getRepository(Document::class);
        $items = $repository->findBy([],[],$limit,$page);

        return $this->json(
            [
                'page' => $page,
                'limit' => $limit,
                'data' => $items
            ]
        );
    }


}
