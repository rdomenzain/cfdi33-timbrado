<?php

namespace rdomenzain\cfdi\timbrado\models\ProFact;

class RequestAsignaTimbresProfact
{

    private $usuarioIntegrador;
    private $rfcEmisor;
    private $noTimbres;

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

    public function setNoTimbres($noTimbres)
    {
        $this->noTimbres = $noTimbres;
    }

    public function getNoTimbres()
    {
        return $this->noTimbres;
    }
}
