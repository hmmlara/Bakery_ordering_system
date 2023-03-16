<?php
include_once __DIR__ . '/../model/ingredient.php';

class IngredientController extends Ingredient{
    public function getCreams(){
        $result = parent::getCreams();
        return $result;
    }

    public function getSizes(){
        $result = parent::getSizes();
        return $result;
    }

    public function getDolls(){
        $result = parent::getDolls();
        return $result;
    }

    public function addCream($cream_name, $cream_color, $cream_scent, $cream_taste, $cream_price){
        $result = parent::addCream($cream_name, $cream_color, $cream_scent, $cream_taste, $cream_price);
        return $result;
    }

    public function getCreamInfo($id){
        $result = parent::getCreamInfo($id);
        return $result;
    }

    public function updateCream($id, $name, $color, $scent, $taste, $price){
        $result = parent::updateCream($id, $name, $color, $scent, $taste, $price);
        return $result;
    }

    public function deleteCream($id){
        $result = parent::deleteCream($id);
        return $result;
    }

    public function addSize($size, $size_price){
        $result = parent::addSize($size, $size_price);
        return $result;
    }

    public function getSizeInfo($id){
        $result = parent::getSizeInfo($id);
        return $result;
    }

    public function updateSize($id, $size, $price){
        $result = parent::updateSize($id, $size, $price);
        return $result;
    }

    public function deleteSize($id){
        $result = parent::deleteSize($id);
        return $result;
    }

    public function addDoll($doll_name, $doll_price){
        $result = parent::addDoll($doll_name, $doll_price);
        return $result;
    }

    public function getDollInfo($id){
        $result = parent::getDollInfo($id);
        return $result;
    }    

    public function updateDoll($id, $type, $price){
        $result = parent::updateDoll($id, $type, $price);
        return $result;
    }

    public function deleteDoll($id){
        $result = parent::deleteDoll($id);
        return $result;
    }
}