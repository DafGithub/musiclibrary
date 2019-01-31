<?php

namespace App\Controller;

use App\Entity\Song;
use App\Form\SongSearchType;
use App\Repository\SongRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SongController extends AbstractController
{
    /**
     * @var SongRepository
     */
    private $repository;
    /**
     * @var ObjectManager
     */
    private $em;

    public function __construct(SongRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/song", name="song")
     * @return Response
     */
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
        $search = new Song();
        $form = $this->createForm(SongSearchType::class, $search);
        $form->handleRequest($request);

        $songs = $paginator->paginate(
            $this->repository->findAllVisibleQuery($search),
            $request->query->getInt('page', 1),
            12
        );


        return $this->render('song/index.html.twig', [
            'current_menu' => 'songs',
            'songs'=> $songs,
            'form'=> $form -> createView(),
        ]);
    }
}
