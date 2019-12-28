<?php

/**
 * This class describes a Product.
 *
 * @Entity
 * @Table(name="products")
 */
class Product
{
    /**
     * The identifier of Product
     *
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;

    /**
     * The name of Product
     *
     * @Column(type="string")
     */
    private $name;

    /**
     * The quantity of Product
     *
     * @Column(type="integer")
     */
    private $quantity;

    /**
     * The price of Product
     *
     * @Column(type="float")
     */
    private $price;


    /**
     * Return id of the product.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Return a name of the product.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set a name of the product.
     *
     * @param string
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Return a quantity of the product.
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set a quantity of the product.
     *
     * @param integer
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * Return a price of the product in format 0.00.
     *
     * @return string
     */
    public function getPriceForInput()
    {
        return number_format($this->price, 2, '.', '');
    }

    /**
     * Return a price of the product.
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set a price of the product.
     *
     * @param float
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
}

