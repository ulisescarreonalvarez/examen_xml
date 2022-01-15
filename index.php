<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once './CFDI.php';

class Main
{
    # Se hacen protegidas para acceder a ellas, no es necesario hacerlas publicas ya que se usan dentro de la clase
    public $cfdi_xml;
    public $array_data = [
        "Comprobante" => [
            "LugarExpedicion" => "64000",
            "TipoDeComprobante" => "i",
            "Moneda" => "MXN",
            "SubTotal" => "100",
            "Total" => "116",
            "FormaPago" => "01",
            "NoCertificado" => "00000000001010101010", #Formato no acorde al requerdio en la documentación del SAT -> [0-9]{20}
            "Fecha" => "2021-10-06 11:00:00",
        ],
        "Emisor" => [
            "Rfc" => "TME960709LR2",
            "Nombre" => "Tracto Camiones S.A. de C.V.",
            "RegimenFiscal" => "612"
        ]
    ];

    #Se hace publica
    public function __construct()
    {
        $this->cfdi_xml = new CFDI;
    }

    final public function createXML()
    {
        //Obtener el XML por medio de la clase XML
        foreach ($this->array_data as $key => $value) :
            if ($key === (string) 'Comprobante') :                                      # != se cambia por ===
                foreach ($value as $attribute => $value) :
                    //Setear attributos
                    $this->cfdi_xml->comprobante->setAtribute($attribute, $value);      # Se accede al atributo "Comprobante" y 
                endforeach;
            endif;
            if ($key === (string) 'Emisor') :                                            # != se cambia por ===
                foreach ($value as $attribute => $value) :
                    //Setear attributos
                    $this->cfdi_xml->emisor->setAtribute($attribute, $value);
                endforeach;
            endif;
        endforeach;
        echo $this->cfdi_xml->getNode();
    }
}

try {
    $main = new Main;
    $main->createXML();
} catch (\Exception $error) {
    echo $error->getMessage();
}
