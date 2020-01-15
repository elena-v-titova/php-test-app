<?php

/**
 * The class describes edit actions for a Product.
 */

class ProductEdit
{
    /**
     * The method creates
     *  - an empty form for creating a product, or
     *  - the form with fields mark as error if a new Product was not created, or
     *  - the new Product and save it in database.
     *
     * Return the twig parametrs.
     * @return array
     */
    static public function create($entityManager)
    {
        $twigParams = [
            'template' => 'create_product.html',
            'params'   => [
                'title' => 'Добавление нового товара'
            ]
        ];

        if (isset($_POST) and $_POST['create_product']) {
            $productForm = new ProductForm();
            $productForm->check();

            if ($productForm->isError()) {
                $twigParams['params']['form_error'] = $productForm->getErrors();
            } else {
                $pdb = new ProductDB($entityManager);

                if ($pdb->getByName($productForm->getName()) !== NULL) {
                    $twigParams['params']['exist_error'] = 'Товар с таким наименованием уже существует';
                } else {
                    $product = new Product();
                    $product->setName($productForm->getName());
                    $product->setQuantity($productForm->getQuantity());
                    $product->setPrice($productForm->getPrice());

                    $pdb->save($product);

                    $twigParams['params']['product'] = $product;
                }
            }
        }

        return $twigParams;
    }
}

