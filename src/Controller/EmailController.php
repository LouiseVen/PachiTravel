<?php

namespace App\Controller;

use App\Form\EmailType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class EmailController extends AbstractController
{
    #[Route('/email', name: 'app_email')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser(); // Assuming you have a User entity or security system in place

        $form = $this->createForm(EmailType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            // Redirect to some page or show a success message
            return $this->redirectToRoute('app_account'); // Replace 'profile' with the route name to the user's profile page
        }

        return $this->render('email/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
