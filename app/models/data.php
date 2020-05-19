<?php

class data extends xmlData{

    public function getxmlFile($xmlFile)
    {
        $xmlFile = $this->getXml($xmlFile);
        return $xmlFile;
    }
}


?>