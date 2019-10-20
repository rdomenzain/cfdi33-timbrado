<?php

namespace rdomenzain\cfdi\timbrado\models\ProFact;

class RequestCancelaCFDIProFact
{
    private $usuarioIntegrador;
    private $rfcEmisor;
    private $folioUUID;

    function __construct()
    { }

    public function getUsuarioIntegrador()
    {
        return $this->usuarioIntegrador;
    }

    public function setUsuarioIntegrador($usuarioIntegrador)
    {
        $this->usuarioIntegrador = $usuarioIntegrador;
    }

    public function getRfcEmisor()
    {
        return $this->rfcEmisor;
    }

    public function setRfcEmisor($rfcEmisor)
    {
        $this->rfcEmisor = $rfcEmisor;
    }


    public function getFolioUUID()
    {
        return $this->folioUUID;
    }

    public function setFolioUUID($folioUUID)
    {
        $this->folioUUID = $folioUUID;
    }
}
