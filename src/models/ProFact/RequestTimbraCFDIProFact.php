<?php

namespace rdomenzain\cfdi\timbrado\models\ProFact;

class RequestTimbraCFDIProFact
{

    private $usuarioIntegrador;
    private $xmlComprobanteBase64;
    private $idComprobante;

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

    public function getXmlComprobanteBase64()
    {
        return $this->xmlComprobanteBase64;
    }

    public function setXmlComprobanteBase64($xmlComprobanteBase64)
    {
        $this->xmlComprobanteBase64 = $xmlComprobanteBase64;
    }

    public function getIdComprobante()
    {
        return $this->usuarioIntegrador;
    }

    public function setIdComprobante($idComprobante)
    {
        $this->idComprobante = $idComprobante;
    }
}
