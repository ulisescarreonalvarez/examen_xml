<?php

class Emisor extends XML
{

    # public $regimenFiscal;            -> No se usa en ningun lado de la calse, ni es requerida fuera de la misma

    # Se hace publico
    public function __construct()
    {
        $this->atributos = [];
        $this->atributos['Rfc'] = '';   # Se agrega el atributo faltante: "Rfc"
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
