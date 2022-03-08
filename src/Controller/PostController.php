<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use PostFactory;
use Post;

#[Route(path: "/posts", name: "posts_", methods: ['GET', 'POST'])]
class PostController extends AbstractController
{

    #[Route(path: "", name: "all", methods: ["GET"])]
    function all(): Response
    {
        $post1 = PostFactory::create("test title", "test content");
        $post1->setId("1");

        $post2 = PostFactory::create("test title", "test content");
        $post2->setId("2");
        $data = [reset($post1), reset($post2),]; 

        return $this->json($data, 200, ["Content-Type" => "application/json"]);
    }
    
}   