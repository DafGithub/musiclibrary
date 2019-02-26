<?php

namespace App\Controller;

use App\Form\Handler\UserHandler;
use App\Form\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error]);
    }

    /**
     * @param UserHandler $userHandler
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @return Response
     * @Route("/register", name="app_register")
     */
    public function register(UserHandler $userHandler, Request $request, UserPasswordEncoderInterface $encoder): Response
    {

        $form = $this->createForm(RegisterType::class);
        if($userHandler->handle($form, $request, $encoder)){

            $this->addFlash(
                'success',
                'You are registered, please sign in !'
            );
            return $this->redirectToRoute('app_login');

        }
        return $this->render('security/register.html.twig', [
            'form'=>$form->createView()
        ]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {

    }

}
