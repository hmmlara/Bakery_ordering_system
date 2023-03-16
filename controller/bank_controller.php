<?php
include_once __DIR__ . '/../model/bank_model.php';

class BankController extends Bank
{
    public function checkCard($card)
    {
        $result = $this->checkingCard($card);
        return $result;
    }

    public function getAmount($card)
    {
        $result = $this->gettingAmount($card);
        return $result;
    }

    public function updateAmount($updateAmount,$card)
    {
        $result = $this->updatingAmount($updateAmount,$card);
        return $result;
    }


}