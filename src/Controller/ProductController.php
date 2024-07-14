<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ProductController.php',
        ]);
    }
}
class ProductController extends AbstractController
{
/**
* @Route("/products", methods={"GET"})
*/
public function getProducts(ProductRepository $productRepository): JsonRespons
{
$products = $productRepository->findAll();
return $this->json($products);
}
/**
* @Route("/products", methods={"POST"})
*/
public function createProduct(Request $request, EntityManagerInterface $em): J
{
$data = json_decode($request->getContent(), true);
$product = new Product();
$product->setName($data['name']);
$product->setPrice($data['price']);
$em->persist($product);
$em->flush();
return $this->json($product);
}
}
