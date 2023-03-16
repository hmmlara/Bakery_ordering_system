<?php
include_once __DIR__ . '/../model/baker.php';

class BakerController extends Baker
{
    public function getBakers()
    {
        $baker = $this->bakerInfo();
        return $baker;
    }

    public function getAllBakers()
    {
        $result = $this->getAllBakerInfo();
        return $result;
    }

    public function addBaker($name, $position, $note, $photo)
    {
        $result = $this->newBaker($name, $position, $note, $photo);
        return $result;
    }

    public function getBaker($id)
    {
        $result = $this->getBakerInfo($id);
        return $result;
    }

    public function updateBaker($id, $name, $position, $note, $image)
    {
        $result = $this->updateBakerInfo($id, $name, $position, $note, $image);
        return $result;
    }

    public function deleteBaker($id)
    {
        $result = $this->deleteBakerInfo($id);
        return $result;
    }
}
?>