<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UsersController
 * @package App\Controller
 * @Route("/api/v1/users")
 */
class UsersController extends AbstractController
{
    /**
     * @Route("/", name="users-post", methods={"POST"} )
     * @return JsonResponse
     */
    public function usersPost()
    {
        return $this->json([
            'controller_name' => 'UsersController',
            'methods_name' => 'usersPost',
        ]);
    }

    /**
     * @Route("/", name="users-get", methods={"GET", "HEAD"} )
     * @return JsonResponse
     */
    public function usersGetHead()
    {
        return $this->json([
            'controller_name' => 'UsersController',
            'methods_name' => 'usersGetHeadPost'
        ]);
    }
}
