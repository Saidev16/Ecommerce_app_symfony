<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\RedirectController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;


class ProductController extends AbstractController
{

    /**
     * @Route("/nos-produits", name="products")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $products = $em->getRepository(Product::class )->findAll();


        return $this->render('product/index.html.twig', [
            'products'=> $products
        ]);
    }

    /**
     * @Route("/produit/{slug}", name="product")
     */
    public function show($slug): Response
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository(Product::class )->findOneBySlug($slug);
        if(!$product){
            return $this->RedirectToRoute('products');
        }

        return $this->render('product/show.html.twig', [
            'product'=> $product
        ]);
    }
}
