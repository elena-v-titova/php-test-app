<?php

/*
    This action gets all products.
 */

function listProducts ($entityManager)
{
    $productRepository = $entityManager->getRepository('Product');
    $products = $productRepository->findAll();

    $twigParams = [
        'template' => 'list_products.html',
        'params'   => [
            'title'    => 'Список товаров',
            'products' => $products
        ]
    ];
    return $twigParams;
}

