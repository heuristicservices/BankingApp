<?php

namespace App\Controller;

use App\Service\BankService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HomeController extends AbstractController
{
    #[Route('/')]
    public function home(Environment $environment, BankService $bankService) {
        return new Response($bankService->getBank('acme_bank')->deposit(100));
    }
}