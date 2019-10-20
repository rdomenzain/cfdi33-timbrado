<?php

namespace rdomenzain\cfdi\timbrado\core\ProFact;

use nusoap_client;
use rdomenzain\cfdi\timbrado\models\ProFact\RequestObtieneCFDIProFact;
use rdomenzain\cfdi\timbrado\models\ProFact\RequestTimbraCFDIProFact;
use rdomenzain\cfdi\timbrado\models\ProFact\ResponseObtieneCFDIProFact;
use rdomenzain\cfdi\timbrado\models\ProFact\ResponseTimbraCFDIProFact;

/**
 * Contiene los metodos relaciones al timbrado en el WS de ProFact
 */
class TimbrarProFact
{
    /**
     * Variable con el cliente de nusoap
     *
     * @var nusoap_client
     */
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
     * Llama al servicio de timbrado de ProFact
     *
     * @param RequestTimbraCFDIProFact $request
     * @return ResponseTimbraCFDIProFact
     */
    public function TimbraCFDI($request)
    {
        $resul = new ResponseTimbraCFDIProFact();
        try {
            $params = array(
                'usuarioIntegrador' => $request->getUsuarioIntegrador(),
                'xmlComprobanteBase64' => $request->getXmlComprobanteBase64(),
                'idComprobante' => $request->getIdComprobante()
            );
            $responseClient = $this->client->call('TimbraCFDI', array('parameters' => $params));
            $resul->setCodeResponse($responseClient->TimbraCFDIResult->anyType[1]);
            if ($resul->getCodeResponse() == 0) {
                $resul->setTypeResponse('Timbrado');
                $resul->setMessageResponse('Timbrado Correcto.');
                $resul->setXml($responseClient->TimbraCFDIResult->anyType[3]);
                $resul->setQrCodeBase64($responseClient->TimbraCFDIResult->anyType[4]);
                $resul->setCadenaOriginal($responseClient->TimbraCFDIResult->anyType[5]);
                $resul->setErrorSat($responseClient->TimbraCFDIResult->anyType[6]);
                $resul->setMessageSat(null);
                $resul->setUUID($responseClient->TimbraCFDIResult->anyType[8]);
                $resul->setResponseAny($responseClient->TimbraCFDIResult->anyType);
            } else {
                $resul->setTypeResponse($responseClient->TimbraCFDIResult->anyType[0]);
                $resul->setMessageResponse($responseClient->TimbraCFDIResult->anyType[2]);
                $resul->setXml(null);
                $resul->setQrCodeBase64(null);
                $resul->setCadenaOriginal(null);
                $resul->setErrorSat($responseClient->TimbraCFDIResult->anyType[6]);
                $resul->setMessageSat($responseClient->TimbraCFDIResult->anyType[7]);
                $resul->setUUID(null);
                $resul->setResponseAny(array());
            }
            return $resul;
        } catch (Exception $ex) {
            $resul->setTypeResponse('TimbraCFDI');
            $resul->setCodeResponse($ex->getCode());
            $resul->setMessageResponse($ex->getMessage());
            $resul->setXml(null);
            $resul->setQrCodeBase64(null);
            $resul->setCadenaOriginal(null);
            $resul->setErrorSat(null);
            $resul->setMessageSat(null);
            $resul->setUUID(null);
            $resul->setResponseAny(array());
            return $resul;
        }
    }

    /**
     * Obtiene un CFDI previamente timbrado en ProFact
     *
     * @param RequestObtieneCFDIProFact $request
     * @return ResponseObtieneCFDIProFact
     */
    public function ObtieneCFDI($request)
    {
        $resul = new ResponseObtieneCFDIProFact();
        try {
            $params = array(
                'usuarioIntegrador' => $request->getUsuarioIntegrador(),
                'rfcEmisor' => $request->getRfcEmisor(),
                'folioUUID' => $request->getFolioUUID()
            );
            $responseClient = $this->client->call('ObtieneCFDI', array('parameters' => $params));
            $resul->setCodeResponse($responseClient->ObtieneCFDIResult->anyType[1]);
            if ($resul->getCodeResponse() == 0) {
                $resul->setTypeResponse('ObtieneCFDI');
                $resul->setMessageResponse('CFDI OK.');
                $resul->setXml($responseClient->ObtieneCFDIResult->anyType[3]);
                $resul->setQrCodeBase64($responseClient->ObtieneCFDIResult->anyType[4]);
                $resul->setCadenaOriginal($responseClient->ObtieneCFDIResult->anyType[5]);
                $resul->setErrorSat($responseClient->ObtieneCFDIResult->anyType[6]);
                $resul->setMessageSat(null);
                $resul->setResponseAny($responseClient->ObtieneCFDIResult->anyType);
            } else {
                $resul->setTypeResponse($responseClient->ObtieneCFDIResult->anyType[0]);
                $resul->setMessageResponse($responseClient->ObtieneCFDIResult->anyType[2]);
                $resul->setXml(null);
                $resul->setQrCodeBase64(null);
                $resul->setCadenaOriginal(null);
                $resul->setErrorSat($responseClient->ObtieneCFDIResult->anyType[6]);
                $resul->setMessageSat($responseClient->ObtieneCFDIResult->anyType[7]);
                $resul->setResponseAny(array());
            }
            return $resul;
        } catch (Exception $ex) {
            $resul->setTypeResponse('ObtieneCFDI');
            $resul->setCodeResponse($ex->getCode());
            $resul->setMessageResponse($ex->getMessage());
            $resul->setXml(null);
            $resul->setQrCodeBase64(null);
            $resul->setCadenaOriginal(null);
            $resul->setErrorSat(null);
            $resul->setMessageSat(null);
            $resul->setResponseAny(array());
            return $resul;
        }
    }
}
