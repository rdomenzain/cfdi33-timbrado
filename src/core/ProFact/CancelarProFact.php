<?php

namespace rdomenzain\cfdi\timbrado\core\ProFact;

use rdomenzain\cfdi\timbrado\models\ProFact\RequestCancelaCFDIProFact;
use rdomenzain\cfdi\timbrado\models\ProFact\ResponseCancelaCFDIAcuseProFact;
use rdomenzain\cfdi\timbrado\models\ProFact\ResponseCancelaCFDIProFact;

/**
 * Servicios relacionados a la cancelacion con ProFact
 */
class CancelarProFact
{

    private $client;

    /**
     * Inicializa la clase, debe especificar si esta en modo pruebas o productivo
     *
     * @param bool $isProduction
     */
    function __construct($isProduction)
    {
        if ($isProduction) {
            $this->client = new nusoap_client(Constantes::URL_PROFACT_PODUCCION, 'wsdl');
        } else {
            $this->client = new nusoap_client(Constantes::URL_PROFACT_PRUEBAS, 'wsdl');
        }
        $this->client->soap_defencoding = 'UTF-8';
        $this->client->decode_utf8 = false;
    }

    /**
     * Cancela un CFDI 3.3 sin recibir acuse de cancelacion
     *
     * @param RequestCancelaCFDIProFact $request
     * @return ResponseCancelaCFDIProFact
     */
    public function CancelaCFDI($request)
    {
        $resul = new ResponseCancelaCFDIProFact();
        try {
            $params = array(
                'usuarioIntegrador' => $request->getUsuarioIntegrador(),
                'rfcEmisor' => $request->getRfcEmisor(),
                'folioUUID' => $request->getFolioUUID()
            );
            $responseClient = $this->client->call('CancelaCFDI', array('parameters' => $params));
            $resul->setCodeResponse($responseClient->CancelaCFDIResult->anyType[1]);
            if ($resul->getCodeResponse() == 0) {
                $resul->setTypeResponse('CancelaCFDI');
                $resul->setMessageResponse($responseClient->CancelaCFDIResult->anyType[2]);
                $resul->setErrorSat($responseClient->CancelaCFDIResult->anyType[6]);
                $resul->setMessageSat(null);
                $resul->setUUID($responseClient->CancelaCFDIResult->anyType[8]);
                $resul->setResponseAny($responseClient->CancelaCFDIResult->anyType);
            } else {
                $resul->setTypeResponse($responseClient->CancelaCFDIResult->anyType[0]);
                $resul->setMessageResponse($responseClient->CancelaCFDIResult->anyType[2]);
                $resul->setErrorSat($responseClient->CancelaCFDIResult->anyType[6]);
                $resul->setMessageSat($responseClient->CancelaCFDIResult->anyType[7]);
                $resul->setUUID(null);
                $resul->setResponseAny(array());
            }
            return $resul;
        } catch (Exception $ex) {
            $resul->setTypeResponse('CancelaCFDI');
            $resul->setCodeResponse($ex->getCode());
            $resul->setMessageResponse($ex->getMessage());
            $resul->setErrorSat(null);
            $resul->setMessageSat(null);
            $resul->setUUID(null);
            $resul->setResponseAny(array());
            return $resul;
        }
    }

    /**
     * Cancela un CFDI 3.3 con acuse del SAT
     *
     * @param RequestCancelaCFDIProFact $request
     * @return ResponseCancelaCFDIAcuseProFact
     */
    public function CancelaCFDIAck($request)
    {
        $resul = new ResponseCancelaCFDIAcuseProFact();
        try {
            $params = array(
                'usuarioIntegrador' => $request->getUsuarioIntegrador(),
                'rfcEmisor' => $request->getRfcEmisor(),
                'folioUUID' => $request->getFolioUUID()
            );
            $responseClient = $this->client->call('CancelaCFDIAck', array('parameters' => $params));
            $resul->setCodeResponse($responseClient->CancelaCFDIAckResult->anyType[1]);
            if ($resul->getCodeResponse() == 0) {
                $resul->setTypeResponse('CancelaCFDIAck');
                $resul->setMessageResponse($responseClient->CancelaCFDIAckResult->anyType[2]);
                $resul->setAcuseSat($responseClient->CancelaCFDIAckResult->anyType[3]);
                $resul->setErrorSat($responseClient->CancelaCFDIAckResult->anyType[6]);
                $resul->setMessageSat(null);
                $resul->setResponseAny($responseClient->CancelaCFDIAckResult->anyType);
            } else {
                $resul->setTypeResponse($responseClient->CancelaCFDIAckResult->anyType[0]);
                $resul->setMessageResponse($responseClient->CancelaCFDIAckResult->anyType[2]);
                $resul->setAcuseSat(null);
                $resul->setErrorSat($responseClient->CancelaCFDIAckResult->anyType[6]);
                $resul->setMessageSat($responseClient->CancelaCFDIAckResult->anyType[7]);
                $resul->setResponseAny(array());
            }
            return $resul;
        } catch (Exception $ex) {
            $resul->setTypeResponse('CancelaCFDI');
            $resul->setCodeResponse($ex->getCode());
            $resul->setMessageResponse($ex->getMessage());
            $resul->setAcuseSat(null);
            $resul->setErrorSat(null);
            $resul->setMessageSat(null);
            $resul->setResponseAny(array());
            return $resul;
        }
    }

}
