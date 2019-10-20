<?php

namespace rdomenzain\cfdi\timbrado\models\ProFact;

class ResponseCancelaCFDIAcuseProFact
{
    private $typeResponse;
    private $codeResponse;
    private $messageResponse;
    private $acuseSat;
    private $errorSat;
    private $messageSat;
    private $responseAny;

    function __construct()
    { }

    public function getTypeResponse()
    {
        return $this->typeResponse;
    }

    public function setTypeResponse($typeResponse)
    {
        $this->typeResponse = $typeResponse;
    }

    public function getCodeResponse()
    {
        return $this->codeResponse;
    }

    public function setCodeResponse($codeResponse)
    {
        $this->codeResponse = $codeResponse;
    }

    public function getMessageResponse()
    {
        return $this->messageResponse;
    }

    public function setMessageResponse($messageResponse)
    {
        $this->messageResponse = $messageResponse;
    }

    public function getAcuseSat()
    {
        return $this->acuseSat;
    }

    public function setAcuseSat($acuseSat)
    {
        $this->acuseSat = $acuseSat;
    }

    public function getErrorSat()
    {
        return $this->errorSat;
    }

    public function setErrorSat($errorSat)
    {
        $this->errorSat = $errorSat;
    }

    public function getMessageSat()
    {
        return $this->messageSat;
    }

    public function setMessageSat($messageSat)
    {
        $this->messageSat = $messageSat;
    }

    public function getResponseAny()
    {
        return $this->responseAny;
    }

    public function setResponseAny($responseAny)
    {
        $this->responseAny = $responseAny;
    }
}
