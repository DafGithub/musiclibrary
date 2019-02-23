<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\SongRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param SongRepository $songRepository
     * @param User $user
     * @return Response
     */
    public function index(SongRepository $songRepository) : Response
    {
        $songs = $songRepository->findLatest();
        return $this->render('home/index.html.twig', [
            'songs' => $songs,
        ]);
    }

}
