<?php

class Emisor extends XML
{

    public $regimenFiscal;

    public function __construct()
    {
        $this->atributos = [];
        $this->atributos['Rfc'] = '';   # Se agrega el atributo faltante: "RFC"
        $this->atributos['Nombre'] = '';
        $this->atributos['RegimenFiscal'] = '';
        $this->rules = [];
        $this->rules['Rfc'] = 'R';  # Atributo requerido
        $this->rules['Nombre'] = 'R';
        $this->rules['RegimenFiscal'] = 'R';
    }

    public function getNode()
    {
        $xml = '<cfdi:Emisor ' . $this->getAtributes() . ' />';
        return $xml;
    }
}
