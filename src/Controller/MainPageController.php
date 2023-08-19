<?php

namespace App\Controller;

use App\Repository\HotelRepository;
use App\Repository\VeterinarianRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainPageController extends AbstractController
{
    #[Route('/home', name: 'app_main_page')]
    public function index(HotelRepository $hotelRepository, VeterinarianRepository $veterinarianRepository): Response
    {

        $user = $this->getUser();
        $hotel = $hotelRepository->findAll();
        $veterinarian = $veterinarianRepository->findAll();
        return $this->render('main_page/index.html.twig', [
            'user' => $user,
            'hotels' => $hotel,
            'veterinarians' => $veterinarian,
        ]);
    }
}
