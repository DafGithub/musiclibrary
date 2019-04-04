<?php

namespace App\Controller;

use App\Entity\Song;
use App\Entity\User;
use App\Form\EditProfileType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Vich\UploaderBundle\Handler\DownloadHandler;

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
        return $this->redirectToRoute('basket');
    }

    /**
     * @Route("/removefavorite/{id}", name="removefavorite")
     */
    public function removeFavorite(Song $song, EntityManagerInterface $em)
    {
        /** @var User $user */
        $user = $this->getUser();
        $user->removeFavorite($song);
        $em->flush();
        return $this->redirectToRoute('basket');
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


    /**
     * @Route("/editprofile", name="editprofile")
     * @IsGranted("ROLE_USER")
     * @param Request $request
     * @param UserInterface $user
     * @param EntityManagerInterface $em
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editProfile(Request $request,UserInterface $user, EntityManagerInterface $em)
    {
        $form =$this->createForm(EditProfileType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->flush();
            $this->addFlash('success', "Profile updated");
            return $this->redirectToRoute('profile');
       }

       return $this->render('member/edit.html.twig',[
           'form' => $form->createView()
       ]);

    }

    /**
     * @Route("/download/{id}", name="download_file")
     * @param DownloadHandler $downloadHandler
     * @param UploadedFile $file
     * @param Song $song
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function downloadFileAction(DownloadHandler $downloadHandler, Song $song){
        return $downloadHandler->downloadObject(
            $song,
            'audioFile',
            null,
            $song->getName().'.'.'wav',
            true
        );
    }
//$song->getgetAudioFile()->getExtension()

}