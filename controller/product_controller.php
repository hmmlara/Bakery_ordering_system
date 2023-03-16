<?php
include_once __DIR__ . '/../model/product.php';

class ProductController extends Product
{
    public function getProducts()
    {
        $product = $this->getAllProducts();
        return $product;
    }

    public function getCustomize()
    {
        $product = $this->getCustomizeProducts();
        return $product;
    }

    public function getProduct_Category($item)
    {
        $product = $this->getCategoryOfProduct($item);
        return $product;
    }

    public function getProductImage($product_id)
    {
        $product = $this->getImage($product_id);
        return $product;
    }

    public function getProductsForSale()
    {
        $product = parent::getProductsForSale();
        return $product;
    }

    public function getProductName($product_id)
    {
        $name = parent::getProductName($product_id);
        return $name;
    }

    public function getProductData($item)
    {
        $name = parent::getProductData($item);
        return $name;
    }

    public function getProductForShow()
    {
        $result=parent::getProductForShow();
        return $result;
    }

    public function getProductsForCarousel()
    {
        $result=parent::getProductsForCarousel();
        return $result;
    }
    public function deleteProducts($id)
    {
        $result=parent::deleteProducts($id);
        return $result;
    }

    public function getProductsByCode($id)
    {
        $result=parent::getProductsByCode($id);
        return $result;
    }
 
}