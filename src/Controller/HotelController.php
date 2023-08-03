<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Hotel;
use App\Repository\HotelRepository;

class HotelController extends AbstractController
{
    #[Route('/hotel', name: 'app_hotel')]
    public function index(HotelRepository $hotelRepository): Response
    {
        $hotels= $hotelRepository->findAll();
        return $this->render('hotel/index.html.twig', [
            'hotels' => $hotels,
        ]);
    }
}
