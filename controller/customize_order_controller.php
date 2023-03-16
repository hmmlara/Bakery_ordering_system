<?php
include_once __DIR__.'/../model/order_model.php';

class CustomizeOrderController extends CustomizeOrder{

public function getorders(){
    $result=$this->getorder();
    return $result;
}

public function getUserName($id)
{
    $result=$this->getName($id);
    return $result;
}

public function getorder_detail($id)
{
    $result=$this->getorder_details($id);
    return $result;
}

public function getordered($id)
{
    $result=$this->getordereds($id);
    return $result;
}

public function getfilters($start_date,$end_date)
{
    $result=$this->getfilter($start_date,$end_date);
    return $result;
}


public function getCustomerData($id)
{
 $result=$this->getData($id);
 return $result;
}

public function countOrders()
{
    $result=parent::countOrders();
    return $result;
}
public function bargraph($year)
{
    $result=parent::bargraph($year);
    return $result;
}
public function bargraphIncome($year)
{
    $result=parent::bargraphIncome($year);
    return $result;
}

public function pieChartData($year)
{
    $result=parent::pieChartData($year);
    return $result;
}

public function pieChartDataCustomize($year)
{
    $result=parent::pieChartDataCustomize($year);
    return $result;
}
}

?>