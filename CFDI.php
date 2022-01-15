<?php

include_once './Classes/XML.php';
include_once './Classes/Comprobante.php';
include_once './Classes/Emisor.php';

class CFDI
{
    #Se agrega $emisor y se hace publica junto a $comprobante para pdoer acceder a ellas fuera de esta clase, $xml se deja protegida ya que no es necesario acceder fuera de la clase
    public $emisor;
    public $comprobante;
    protected $xml;

    # Se hace publico, se puede dejar por defualt
    public function __construct()
    {
        $this->comprobante = new Comprobante();
        $this->emisor = new Emisor();
    }

    public function getNode()
    {
        $this->xml = '<?xml version="1.0" encoding="UTF-8"?> <cfdi:Comprobante  xmlns:cfdi="http://www.sat.gob.mx/cfd/3"  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sat.gob.mx/cfd/3 http://www.sat.gob.mx/sitio_internet/cfd/3/cfdv33.xsd" ' . $this->comprobante->getAtributes() . ' >';
        $this->xml .= $this->emisor->getNode(); 
        $this->xml .= '</cfdi:Comprobante>';

        return $this->xml;
    }
}