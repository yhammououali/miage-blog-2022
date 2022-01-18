<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function home(): Response
    {
        $data = [
            'title' => 'Tintin',
            'description' => 'C\'est Tintin',
        ];

        return $this->render('homepage/homepage.html.twig', [
            'data' => $data,
            'createdAt' => new \DateTime(),
        ]);
    }

    /**
     * @Route("/debug")
     */
    public function debug(): Response
    {
        $object = new \stdClass();
        $object->title = 'Tintin';
        $object->createdAt = new \DateTime();

        dump($object);

        return $this->render('base.html.twig');
    }

    /**
     * @Route("/contact")
     */
    public function contact(): Response
    {
        return new Response('Contact Page!');
    }

    /**
     * @Route("hello/{firstName<[A-Z a-z]+>}/{lastName<[A-Z a-z]+>}")
     */
    public function hello(string $firstName, string $lastName): Response
    {
        return new Response(sprintf('Coucou %s %s', $firstName, $lastName));
    }
}
