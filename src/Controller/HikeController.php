<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HikeController extends AbstractController
{
    #[Route('/hike', name: 'app_hike')]
    public function index(): Response
    {
        return $this->render('hike/hike.html.twig', [
            'controller_name' => 'HikeController',
        ]);
    }
}
