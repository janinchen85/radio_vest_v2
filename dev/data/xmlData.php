<?php

class xmlData {

    protected $_xml;
    
    function __construct() {
        $this->xmlPath              = "../app/datas/";
    }

    public function getXml($xmlData)
    {
        $this->_xml = simplexml_load_file($this->xmlPath.$xmlData.".xml");
        return $this->_xml;
    }

}

?>