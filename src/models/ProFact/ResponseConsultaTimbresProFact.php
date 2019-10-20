<?php

namespace rdomenzain\cfdi\timbrado\models\ProFact;

class ResponseConsultaTimbresProFact
{
    private $typeResponse;
    private $codeResponse;
    private $messageResponse;
    private $timbresContratados;
    private $timbresConsumidos;
    private $timbresDisponibles;
    private $responseAny;

    function __construct()
    { }

    public function setTypeResponse($typeResponse)
    {
        $this->typeResponse = $typeResponse;
    }

    public function getTypeResponse()
    {
        $this->typeResponse;
    }

    public function setCodeResponse($codeResponse)
    {
        $this->codeResponse = $codeResponse;
    }

    public function getCodeResponse()
    {
        return $this->codeResponse;
    }

    public function setMessageResponse($messageResponse)
    {
        $this->messageResponse = $messageResponse;
    }

    public function getMessageResponse()
    {
        return $this->messageResponse;
    }

    public function setTimbresContratados($timbresContratados)
    {
        $this->timbresContratados = $timbresContratados;
    }

    public function geTtimbresContratados()
    {
        $this->timbresContratados;
    }

    public function setTimbresConsumidos($timbresConsumidos)
    {
        $this->timbresConsumidos = $timbresConsumidos;
    }

    public function getTimbresConsumidos()
    {
        $this->timbresConsumidos;
    }

    public function setTimbresDisponibles($timbresDisponibles)
    {
        $this->timbresDisponibles = $timbresDisponibles;
    }

    public function getTimbresDisponibles()
    {
        $this->timbresDisponibles;
    }

    public function setResponseAny($responseAny)
    {
        $this->responseAny = $responseAny;
    }

    public function getResponseAny()
    {
        $this->responseAny;
    }
}
