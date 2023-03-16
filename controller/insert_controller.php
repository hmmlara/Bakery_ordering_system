<?php
include_once __DIR__ . '/../model/insert_model.php';

class InsertController extends Insert
{
    public function addNewOrder($cid,$total_qty,$total_balance,$promotion_amount,$bill,$date)
    {
        $product = $this->addOrder($cid,$total_qty,$total_balance,$promotion_amount,$bill,$date);
        return $product;
    }

    public function getCategoryName($pid)
    {
        $cid=$this->getCategory($pid);
        return $cid;
    }

    public function getProductName($pid)
    {
        $cid=parent::getProductName($pid);
        return $cid;
    }

    public function getOrderId($cid)
    {
        $cid=$this->getOrder($cid);
        return $cid;
    }

    public function addOrderDetail($order_id,$pid,$qty,$unitPrice,$subtotal)
    {
        $result=$this->addOrder_Detail($order_id,$pid,$qty,$unitPrice,$subtotal);
        return $result;
    }

    public function addCustomizeOrderDetail($order_id,$pid,$cream_id,$doll_id,$size_id,$discription,$qty,$unit_price,$subtotal)
    {
        $result=$this->addCustomize_Detail($order_id,$pid,$cream_id,$doll_id,$size_id,$discription,$qty,$unit_price,$subtotal);
        return $result;
    }

    
    
}

?>