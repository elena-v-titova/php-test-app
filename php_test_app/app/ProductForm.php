<?php

/**
 * The class for getting of the Product data from a form and its validation
 */
class ProductForm
{
    /**
     * The name of a Product
     */
    private $name = array();

    /**
     * The quantity of a Product
     */
    private $quantity = array();

    /**
     * The price of a Product
     */
    private $price = array();

    /**
     * The flag of error in the data
     */
    private $error = 0;

    public function __construct()
    {
        $this->getNameFromForm();
        $this->getQuantityFromForm();
        $this->getPriceFromForm();
    }

    /**
     * Get a name from thr form
     */
    private function getNameFromForm()
    {
        $this->name[0] = $_POST['name'];
    }

    /**
     * Get a price from thr form
     */
    private function getPriceFromForm()
    {
        $this->price[0] = $_POST['price'];
    }

    /**
     * Get a quantity from thr form
     */
    private function getQuantityFromForm()
    {
        $this->quantity[0] = $_POST['quantity'];
    }

    /**
     * Check the received data
     */
    public function check()
    {
        $name = (new Validation($this->name[0], 'string'))->validate();
        if (isset($name)) {
            $this->name[0] = $name;
        } else {
            $this->name[1] = 'Неверно указано наименование товара';
            $this->error = 1;
        }

        $quantity = (new Validation($this->quantity[0], 'int'))->validate();
        if (isset($quantity)) {
            $this->quantity[0] = $quantity;
        } else {
            $this->quantity[1] = 'Неверно указано количество товара';
            $this->error = 1;
        }

        $price = (new Validation($this->price[0], 'float'))->validate();
        if (isset($price)) {
            $this->price[0] = $price;
        } else {
            $this->price[1] = 'Неверно указана цена товара';
            $this->error = 1;
        }
    }

    /**
     * Return a status of checking of data
     *
     * @return int
     */
    public function isError()
    {
        return $this->error;
    }

    /**
     * Return the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name[0];
    }

    /**
     * Return the quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity[0];
    }

    /**
     * Return the price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price[0];
    }

    /**
     * Return the error array
     *
     * @return mixed[]
     */
    public function getErrors()
    {
        return array(
            'name'      => $this->name,
            'quantity'  => $this->quantity,
            'price'     => $this->price,
        );
    }
}

