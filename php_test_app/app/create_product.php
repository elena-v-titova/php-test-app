<?php

/*
    This action creates
    - an empty form for creating a product, or
    - the form with fields mark as error if a new Product was not created, or
    - the new Product and save it in database.
 */

function createProduct ($entityManager)
{
    $twigParams = [
        'template' => 'create_product.html',
        'params'   => [
            'title' => 'Добавление нового товара'
        ]
    ];

    if ($_POST and $_POST['create_product']) {
        $product = new Product();
        $error = 0;

        $name = cleanInput($_POST['name']);
        if (empty($name)) {
            $twigParams['params']['error']['name'] = [
                $_POST['name'],
                'Неверно указано наименование товара'
            ];
            $error = 1;
        }

        $quantity = cleanInput($_POST['quantity']);
        $quantity = filter_var($quantity, FILTER_VALIDATE_INT);
        if (empty($quantity)) {
            $twigParams['params']['error']['quantity'] = [
                $_POST['quantity'],
                'Неверно указано количество товара'
            ];
            $error = 1;
        }

        $price = cleanInput($_POST['price']);
        $price = filter_var($price, FILTER_VALIDATE_FLOAT);
        if (empty($price)) {
            $twigParams['params']['error']['price'] = [
                $_POST['price'],
                'Неверно указана цена товара'
            ];
            $error = 1;
        }

        if (!$error) {
            // save the product in database
            $product->setName($name);
            $product->setQuantity($quantity);
            $product->setPrice($price);

            $entityManager->persist($product);
            $entityManager->flush();

            $twigParams['params']['product'] = $product;
        } else {
            // return errors to the form
            $twigParams['params']['error']['price'][0] = $_POST['price'];
            $twigParams['params']['error']['quantity'][0] = $_POST['quantity'];
            $twigParams['params']['error']['name'][0] = $_POST['name'];
        }
    }

    return $twigParams;
}

function cleanInput ($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);

    return $value;
}

