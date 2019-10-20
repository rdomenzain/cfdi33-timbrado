<?php

namespace rdomenzain\cfdi\timbrado\models\ProFact;

class ResponseObtieneCFDIProFact
{
    private $typeResponse;
    private $codeResponse;
    private $messageResponse;
    private $xml;
    private $qrCodeBase64;
    private $cadenaOriginal;
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

    public function getXml()
    {
        return $this->xml;
    }

    public function setXml($xml)
    {
        $this->xml = $xml;
    }

    public function getQrCodeBase64()
    {
        return $this->qrCodeBase64;
    }

    public function setQrCodeBase64($qrCodeBase64)
    {
        $this->qrCodeBase64 = $qrCodeBase64;
    }

    public function getCadenaOriginal()
    {
        return $this->cadenaOriginal;
    }

    public function setCadenaOriginal($cadenaOriginal)
    {
        $this->cadenaOriginal = $cadenaOriginal;
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
