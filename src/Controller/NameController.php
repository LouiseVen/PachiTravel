<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UsernameType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NameController extends AbstractController
{
    #[Route('/name', name: 'app_name')]
    public function editName(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser(); // Assuming you have a User entity or security system in place

        $form = $this->createForm(UsernameType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            // Redirect to some page or show a success message
            return $this->redirectToRoute('app_account'); // Replace 'profile' with the route name to the user's profile page
        }

        return $this->render('name/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
