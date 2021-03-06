<?php

namespace App\Controller;

use App\Entity\Document;
use App\Form\DocumentType;
use App\Repository\DocumentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\FileUploader;
use App\Service\FileConvertor;
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
     * @param FileConvertor $fileConvertor
     //     * @return JsonResponse
     * @return RedirectResponse | Response
     */
    public function documentAttachmentUploadPost($document, Request $request, FileUploader $fileUploader, FileConvertor $fileConvertor)
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
            }
            $document->setTitle('document');
            $document->setUserId(22);
            try {
                $document->setCreated((new \DateTime('now', new \DateTimeZone('Europe/Helsinki'))));
            } catch (\Exception $e) {
            }

            $thumbnailFile = $fileConvertor->convert($pdfFile);
            $document->setThumbnailFileName($thumbnailFile);

            $document->setPdfLink($fileUploader->getTargetDirectory().$document->getPdfFilename());
            $document->setThumbnailLink($fileConvertor->getTargetDirectory().$document->getThumbnailFileName());


            $em = $this->getDoctrine()->getManager();
            $em->persist($document);
            $em->flush();

            return $this->redirect($this->generateUrl('documents-get'));

        }

        return $this->render('documents/new.html.twig', [
            'form' => $form->createView(),
        ]);
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
     * @return JsonResponse | Response
     */
    public function documentGetHead($document)
    {
        $repository = $this->getDoctrine()->getRepository(Document::class);
        $items = $repository->findBy(['id' => $document]) ;

        return $this->render('documents/documents.html.twig', ['data' => $items]);
        /*return $this->json(
            [
                'data' => $items
            ]
        );*/
    }


    /**
     * @Route("/{id}", name="document-delete", methods={"DELETE"} )
     * @param $id
     * @return JsonResponse | RedirectResponse
     */
    public function documentDelete($id)
    {

        $em = $this->getDoctrine()->getManager();
        $document= $em->getReference(Document::class, $id);
        $em->remove($document);
        $em->flush();

        return $this->json([
            'controller_name' => 'DocumentsController',
            'methods_name' => 'documentDelete',
            'document' => $document
        ]);
    }

    /**
     * @Route("/", name="documents-get", methods={"GET", "HEAD", "POST"} )
     * @param int $offset
     * @param Request $request
     * @return JsonResponse | Response
     */
    public function documentsGetHeadPost(Request $request, $offset = 15)
    {
        $limit = $request->get('limit', 20);
        $repository = $this->getDoctrine()->getRepository(Document::class);
        $items = $repository->findBy([],[],$limit,$offset);
        return $this->render('documents/documents.html.twig', ['data' => $items]);

        /*return $this->json(
            [
                'data' => $items
            ]
        );*/
    }


}
