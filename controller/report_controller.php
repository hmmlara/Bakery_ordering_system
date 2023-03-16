<?php
include_once __DIR__.'/../model/report.php';

class ReportController extends Report{
    public function getOrderDetail()
    {
        $result = parent::getOrderDetail();
        return $result;
    }

    public function getfilters($start_date,$end_date, $category_id)
    {
        $result=$this->getfilter($start_date,$end_date, $category_id);
        return $result;
    }

    public function byCategory($category_id){
        $result = parent::byCategory($category_id);
        return $result;
    }

    public function byDate($start_date, $end_date){
        $result = parent::byDate($start_date, $end_date);
        return $result;
    }

    public function byMonth($month){
        $result = parent::byMonth($month);
        return $result;
    }

    public function customizeReport(){
        $result = parent::customizeReport();
        return $result;
    }

    public function customizeByDate($start_date, $end_date){
        $result = parent::customizeByDate($start_date, $end_date);
        return $result;
    }

    public function customizeByMonth($month){
        $result = parent::customizeByMonth($month);
        return $result;
    }

    public function getYear(){
        $result = parent::getYear();
        return $result;
    }

    public function byYear($year){
        $result = parent::byYear($year);
        return $result;
    }

    public function byYearMonth($year, $month)
    {
        $result = parent::byYearMonth($year, $month);
        return $result;
    }

    public function customizeByMonthYear($month, $year)
    {
        $result = parent::customizeByMonthYear($month, $year);
        return $result;
    }

    public function findMax(){
        $result = parent::findMax();
        return $result;
    }

    public function findCustomizeMax(){
        $result = parent::findCustomizeMax();
        return $result;
    }

    public function totalPriceForOrder(){
        $result = parent::totalPriceForOrder();
        return $result;
    }

    public function totalPriceForCustomizeOrder(){
        $result = parent::totalPriceForCustomizeOrder();
        return $result;
    }

    

}
?>