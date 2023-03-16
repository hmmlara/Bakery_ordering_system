<?php

include_once __DIR__."/../model/admin.php";

class AdminController extends Admin{
    
    public function getAdmins()
    {
        $admins=$this->getAdminList();
        return $admins;
    }

    
}

?>