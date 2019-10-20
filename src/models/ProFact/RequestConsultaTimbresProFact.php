<?php

namespace rdomenzain\cfdi\timbrado\models\ProFact;

class RequestConsultaTimbresProFact
{

    private $usuarioIntegrador;
    private $rfcEmisor;

    function __construct()
    { }

    public function setUsuarioIntegrador($usuarioIntegrador)
    {
        $this->usuarioIntegrador = $usuarioIntegrador;
    }

    public function getUsuarioIntegrador()
    {
        return $this->usuarioIntegrador;
    }

    public function setRfcEmisor($rfcEmisor)
    {
        $this->rfcEmisor = $rfcEmisor;
    }

    public function getRfcEmisor()
    {
        return $this->rfcEmisor;
    }
}
