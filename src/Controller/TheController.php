<?php


namespace App\Controller;


use App\Service\TheService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TheController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function endpoint(TheService $theService): Response
    {
        return $this->render('base.html.twig');
    }
}
