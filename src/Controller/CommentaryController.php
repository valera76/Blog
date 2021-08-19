<?php

namespace App\Controller;

use App\Repository\CommentaryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentaryController extends AbstractController
{
    private CommentaryRepository $commentaryRepository;

    /**
     * CommentaryController constructor.
     *
     * @param CommentaryRepository $commentaryRepository
     */
    public function __construct(CommentaryRepository $commentaryRepository)
    {
        $this->commentaryRepository = $commentaryRepository;
    }

    /**
     * @Route("/commentary", name="comment")
     *
     * @return Response
     */
    public function comment(): Response
    {
        return $this->render('commentary/index.html.twig', [
            'commentaries' => $this->commentaryRepository->findAll(),
        ]);
    }
}
