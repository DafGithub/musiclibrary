<?php

namespace App\Controller;

use App\Entity\Song;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @Route("/member")
 */
class MemberController extends AbstractController
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/profile", name="profile")
     */
    public function profile() {
        return $this->render('member/profile.html.twig');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/basket", name="basket")
     */
    public function basket(){
        return $this->render('member/basket.html.twig');
    }

    /**
     * @Route("/addfavorite/{id}", name="addfavorite")
     */
    public function addFavorite(Song $song, EntityManagerInterface $em)
    {
        /** @var User $user */
        $user = $this->getUser();
        $user->addFavorite($song);
        $em->flush();
        return $this->redirectToRoute('home');
    }

    /**
     * @IsGranted("ROLE_USER")
     * @param EntityManagerInterface $em
     * @param UserInterface $user
     * @param TokenStorageInterface $tokenStorage
     * @param FlashBag $flashBag
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/deleteprofile", name="deleteprofile")
     */
    public function deleteProfile(EntityManagerInterface $em, UserInterface $user,
                                  TokenStorageInterface $tokenStorage, FlashBagInterface $flashBag)
    {
        $em->remove($user);
        $em->flush();
        $tokenStorage->setToken(null);
        $flashBag->add('success', 'Profile deleted');
        return$this->redirectToRoute('home');
    }

}