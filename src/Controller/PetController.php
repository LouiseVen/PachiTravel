<?php

namespace App\Controller;

use App\Entity\Pet;
use App\Form\PetType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PetController extends AbstractController
{
    #[Route('/pet', name: 'app_pet')]
    public function addPet(Request $request, EntityManagerInterface $entityManager): Response
    {
        $pet = new Pet();
        $form = $this->createForm(PetType::class, $pet);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser(); // Assuming you have a User entity or security system in place
            $pet->setOwner($user);
            $entityManager->persist($pet);
            $entityManager->flush();

            // Redirect to some page or show a success message
            return $this->redirectToRoute('app_account'); // Replace 'profile' with the route name to the user's profile page
        }

        return $this->render('pet/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/pet/{id}', name: 'app_pet_edit')]
    public function editPet(Request $request, EntityManagerInterface $entityManager, Pet $pet): Response
    {
        // Check if the current user is the owner of the pet or has permission to edit the pet
        // Implement your own logic based on your application's requirements

        $form = $this->createForm(PetType::class, $pet);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            // Redirect to some page or show a success message
            return $this->redirectToRoute('app_account'); // Replace 'profile' with the route name to the user's profile page
        }

        return $this->render('pet/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/pet/{id}', name: 'app_pet_delete', methods: ['DELETE'])]
    public function deletePet(Request $request, EntityManagerInterface $entityManager, Pet $pet): Response
    {
        // Check if the current user is the owner of the pet or has permission to delete the pet
        // Implement your own logic based on your application's requirements

        if ($this->isCsrfTokenValid('delete' . $pet->getId(), $request->request->get('_token'))) {
            $entityManager->remove($pet);
            $entityManager->flush();

            // Redirect to some page or show a success message
            return $this->redirectToRoute('app_account'); // Replace 'profile' with the route name to the user's profile page
        }

        // Redirect to some page or show an error message if the CSRF token is not valid
        return $this->redirectToRoute('app_account'); // Replace 'profile' with the route name to the user's profile page
    }
}
