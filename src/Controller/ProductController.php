<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ProductController extends AbstractController
{
    #[Route('/product/{id}', name: 'app_product')]
    public function index(
        int $id,
        ProductRepository $productRepository,
        SerializerInterface $serializer
    ): Response
    {
        $product = $productRepository->find($id);

        return new JsonResponse($serializer->serialize($product, 'json'), json: true);
    }
}
