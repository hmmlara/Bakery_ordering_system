<?php
    include_once __DIR__ ."/../model/history_model.php";

    class historyController extends History
    {
        public function getHistory($cid)
        {
            $result = $this->getAllHistory($cid);
            return $result;
        }

        public function getHistoryDetail_order($oid)
        {
            $result = $this->getAllHistoryDetail_order($oid);
            return $result;
        }

        public function getHistoryDetail_customize($oid)
        {
            $result = $this->getAllHistoryDetail_customize($oid);
            return $result;
        }

    }
?>