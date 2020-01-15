<?php

/**
 * The class describes view actions for a Product.
 */

class ProductView
{
    /**
     * The method gets all products.
     * Return twig parametrs.
     *
     * @return array
     */
    static public function getAll ($entityManager)
    {
        $pdb = new ProductDB($entityManager);
        $products = $pdb->getAll();

        $twigParams = [
            'template' => 'list_products.html',
            'params'   => [
                'title'    => 'Список товаров',
                'products' => $products
            ]
        ];
        return $twigParams;
    }
}

