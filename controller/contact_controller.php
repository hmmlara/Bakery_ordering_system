<?php
include_once __DIR__ . '/../model/contact.php';

class ContactController extends Contact
{
    public function addContact($name,$email,$message)
    {
        $result = $this->addForContact($name,$email,$message);
        return $result;
    }

    public function getContactPage($page)
       {
        $result=parent::getContactPage($page);
        return $result;
       }

    public function getContacts()
       {
        $result=parent::getContacts();
        return $result;
       }
}

?>