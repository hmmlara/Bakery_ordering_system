<?php
include_once __DIR__ . '/../model/promotion.php';

class PromotionController extends Promotion
{
    public function Promotions()
    {
        $result = $this->promoInfo();
        return $result;
    }

    public function addPromotion($name, $percentage, $start_date, $end_date)
    {
        $result = $this->newPromotion($name, $percentage, $start_date, $end_date);
        return $result;
    }

    public function getPromotion($id)
    {
        $result = $this->getPromotionInfo($id);
        return $result;
    }

    public function updatePromotion($id, $name, $percentage, $start_date, $end_date)
    {
        $result = $this->updatePromotionInfo($id, $name, $percentage, $start_date, $end_date);
        return $result;
    }

    public function deletePromotion($id)
    {
        $result = $this->deletePromotionInfo($id);
        return $result;
    }

    public function today_promotion()
    {
        $result=$this->getTodayPromotion();
        return $result;
    }
}
?>