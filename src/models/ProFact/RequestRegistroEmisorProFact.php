<?php

namespace rdomenzain\cfdi\timbrado\models\ProFact;

class RequestRegistroEmisorProFact
{
    private $usuarioIntegrador;
    private $rfcEmisor;
    private $base64Cer;
    private $base64Key;
    private $contrasena;

    public function __construct()
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

    public function getBase64Cer()
    {
        return $this->base64Cer;
    }

    public function setBase64Cer($base64Cer)
    {
        $this->base64Cer = $base64Cer;
    }

    public function getBase64Key()
    {
        return $this->base64Key;
    }

    public function setBase64Key($base64Key)
    {
        $this->base64Key = $base64Key;
    }

    public function getContrasena()
    {
        return $this->contrasena;
    }

    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }
}
