<?php

namespace rdomenzain\cfdi\timbrado\models\ProFact;

class ResponseRegistroEmisorProFact
{
    private $typeResponse;
    private $codeResponse;
    private $messageResponse;
    private $responseAny;

    public function __construct()
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
        $this->codeResponse;
    }

    public function setMessageResponse($messageResponse)
    {
        $this->messageResponse = $messageResponse;
    }

    public function getMessageResponse()
    {
        $this->typeResponse;
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
