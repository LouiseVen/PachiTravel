<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
// use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Security\Core\Annotation\IsGranted;

use App\Repository\UserRepository;

class AccountController extends AbstractController
{

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    #[Route('/account', name: 'app_account')]
    // #[IsGranted('ROLE_USER')]
    public function index(User $user): Response
    {
        dump($user);
        $user=$this->getUser();
        dump($user);
        if ($user==null) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('account/index.html.twig', [
            'controller_name' => 'AccountController',
            'user' => $user,
        ]);
        
        
    }

    #[Route('/logout', name:'app_logout')]
    public function logoutAction(){
        return $this->render('logout.html.twig');
    }
}
