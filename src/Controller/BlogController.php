<?php

namespace App\Controller;

use App\Entity\Blog;
use App\Repository\BlogRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController

{
    private BlogRepository $blogRepository;

    /**
     * BlogController constructor.
     *
     * @param BlogRepository $blogRepository
     */
    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    /**
     * @Route("/blog", name="blog")
     *
     * @return Response
     */
    public function blog(): Response
    {
        return $this->render('blog/index.html.twig', [
            'blogs' => $this->blogRepository->findAll(),
        ]);
    }

    /**
     * @Route("/blog/{slug}", name="blog_item")
     *
     * @param Blog $blog
     *
     * @return Response
     */
    public function blogItem(Blog $blog): Response
    {
        return $this->render('blog/item.html.twig', [
            'blog' => $blog,
        ]);
    }

    /**
     * @Route("/index", name="blog_home")
     */
    public function blogHome(): Response
    {
        return $this->render('index/index.html.twig');
    }
}
