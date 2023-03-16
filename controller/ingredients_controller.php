<?php
include_once __DIR__ . '/../model/ingredient.php';

class IngredientController extends Ingredient
{
    public function getCreams()
    {
        $baker = $this->getAllCreams();
        return $baker;
    }

    public function getDolls()
    {
        $baker = $this->getAllDolls();
        return $baker;
    }

    public function getSizes()
    {
        $baker = $this->getAllSizes();
        return $baker;
    }

    public function addIngredient($cid,$cream,$size,$doll,$discription,$product_id)
    {
        $result = $this->addAllIngredient($cid,$cream,$size,$doll,$discription,$product_id);
        return $result;
    }

    public function getCreamPrice($cream)
    {
        $cream_price = parent::getCreamPrice($cream);
        return $cream_price;
    }

    public function getDollPrice($doll)
    {
        $cream_price = parent::getDollPrice($doll);
        return $cream_price;
    }

    public function getSizePrice($size)
    {
        $cream_price = parent::getSizePrice($size);
        return $cream_price;
    }

    

}