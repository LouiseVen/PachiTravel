<?php

namespace App\Controller;

use App\Repository\VeterinarianRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VeterinariansController extends AbstractController
{
    #[Route('/veterinarians', name: 'app_veterinarians')]
    public function index(VeterinarianRepository $veterinariansRepository): Response
    {
        $veterinarians = $veterinariansRepository->findAll();
        return $this->render('veterinarians/index.html.twig', [
            'veterinarians' => $veterinarians,
        ]);
    }
}
