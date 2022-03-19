<?php

namespace App\Controller\Admin;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminListController extends AbstractController
{
    /**
     * @Route("/admin/list", name="app_admin_admin_list")
     */
    public function userList(UserRepository $user): Response
    {
        return $this->render('admin/admin_list/index.html.twig', [
            'users' =>$user->findAll()
        ]);
    }
}
