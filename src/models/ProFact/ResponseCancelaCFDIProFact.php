<?php

namespace rdomenzain\cfdi\timbrado\models\ProFact;

class ResponseCancelaCFDIProFact
{
    private $typeResponse;
    private $codeResponse;
    private $messageResponse;
    private $errorSat;
    private $messageSat;
    private $UUID;
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

    public function getUUID()
    {
        return $this->UUID;
    }

    public function setUUID($UUID)
    {
        $this->UUID = $UUID;
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
