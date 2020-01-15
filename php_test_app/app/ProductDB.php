<?php

/**
 * The class for the product database repository
 */
class ProductDB
{
    /**
     * The database
     */
    private $db;

    public function __construct($entityManager)
    {
        $this->db = $entityManager;
    }

    /**
     * Save the Product in the database.
     *
     * @param Product
     */
    public function save(Product $p)
    {
        $this->db->persist($p);
        $this->db->flush();
    }

    /**
     * Return all Products from the database.
     *
     * @return Product[]
     */
    public function getAll()
    {
        $productRepository = $this->db->getRepository('Product');
        return $productRepository->findAll();
    }

    /**
     * Return the Product by name from the database.
     *
     * @return Product|null
     */
    public function getByName($name)
    {
        $productRepository = $this->db->getRepository('Product');
        return $productRepository->findOneBy(['name' => $name]);
    }
}

