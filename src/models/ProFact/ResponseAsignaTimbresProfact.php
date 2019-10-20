<?php

namespace rdomenzain\cfdi\timbrado\models\ProFact;

class ResponseAsignaTimbresProfact
{
    private $codeResponse;
    private $messageResponse;

    function __construct()
    { }

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
}
