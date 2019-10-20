<?php

namespace rdomenzain\cfdi\timbrado\core\ProFact;

use Exception;
use nusoap_client;
use rdomenzain\cfdi\timbrado\models\ProFact\RequestAsignaTimbresProfact;
use rdomenzain\cfdi\timbrado\models\ProFact\RequestRegistroEmisorProFact;
use rdomenzain\cfdi\timbrado\models\ProFact\ResponseAsignaTimbresProfact;
use rdomenzain\cfdi\timbrado\models\ProFact\ResponseRegistroEmisorProFact;
use rdomenzain\cfdi\timbrado\utils\Constantes;

class UtileriasProFact
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
     * Registra emisor en el portal de Profact, este es un paso necesario ya que sin registrar no se puede facturar
     *
     * @param RequestRegistroEmisorProFact $request
     * @return ResponseRegistroEmisorProFact
     */
    public function RegistraEmisor($request)
    {
        $resul = new ResponseRegistroEmisorProFact();
        try {
            $params = array(
                'usuarioIntegrador' => $request->getUsuarioIntegrador(),
                'rfcEmisor' => $request->getRfcEmisor(),
                'base64Cer' => $request->getBase64Cer(),
                'base64Key' => $request->getBase64Key(),
                'contrasena' => $request->getContrasena()
            );
            $responseClient = $this->client->call('RegistraEmisor', array('parameters' => $params));
            $resul->setTypeResponse($responseClient->RegistraEmisorResult->anyType[0]);
            $resul->setCodeResponse($responseClient->RegistraEmisorResult->anyType[1]);
            $resul->setMessageResponse($responseClient->RegistraEmisorResult->anyType[2]);
            $resul->setResponseAny($responseClient->RegistraEmisorResult->anyType);
            return $resul;
        } catch (Exception $ex) {
            $resul->setTypeResponse('RegistraEmisor');
            $resul->setCodeResponse($ex->getCode());
            $resul->setMessageResponse($ex->getMessage());
            $resul->setResponseAny(array());
            return $resul;
        }
    }

    /**
     * Asigna timbres a un emisor previamente registrado
     *
     * @param RequestAsignaTimbresProfact $request
     * @return void
     */
    public function AsignaTimbresEmisor($request)
    {
        $resul = new ResponseAsignaTimbresProfact();
        try {
            $params = array(
                'usuarioIntegrador' => $request->getUsuarioIntegrador(),
                'rfcEmisor' => $request->getRfcEmisor(),
                'noTimbres' => $request->getNoTimbres()
            );
            $responseClient = $this->client->call('AsignaTimbresEmisor', array('parameters' => $params));

            $resul->setCodeResponse($responseClient->AsignaTimbresEmisorResult->anyType[1]);
            $resul->setMessageResponse($responseClient->AsignaTimbresEmisorResult->anyType[2]);

            $resul->setTypeResponse($responseClient->AsignaTimbresEmisorResult->anyType[0]);
            $resul->setCodeResponse($responseClient->AsignaTimbresEmisorResult->anyType[1]);
            if ($resul->getCodeResponse() == 0) {
                $resul->setMessageResponse('Proceso correcto');
            } else {
                $resul->setMessageResponse($responseClient->AsignaTimbresEmisorResult->anyType[2]);
            }

            return $resul;
        } catch (Exception $ex) {
            $resul->setCodeResponse($ex->getCode());
            $resul->setMessageResponse($ex->getMessage());
            return $resul;
        }
    }

    /**
     * Obtiene la informacion de timbres disponibles
     *
     * @param RequestConsultaTimbresProFact $request
     * @return ResponseConsultaTimbresProFact
     */
    public function InfoTimbresEmisor($request)
    {
        $resul = new ResponseConsultaTimbresProFact();
        try {
            $params = array(
                'usuarioIntegrador' => $request->getUsuarioIntegrador(),
                'rfcEmisor' => $request->getRfcEmisor()
            );
            $responseClient = $this->client->call('ObtieneTimbresDisponibles', array('parameters' => $params));
            $resul->setTypeResponse($responseClient->ObtieneTimbresDisponiblesResult->anyType[0]);
            $resul->setCodeResponse($responseClient->ObtieneTimbresDisponiblesResult->anyType[1]);
            $resul->setMessageResponse($responseClient->ObtieneTimbresDisponiblesResult->anyType[2]);
            $resul->setTimbresContratados($responseClient->ObtieneTimbresDisponiblesResult->anyType[3]);
            $resul->setTimbresConsumidos($responseClient->ObtieneTimbresDisponiblesResult->anyType[4]);
            $resul->setTimbresDisponibles($responseClient->ObtieneTimbresDisponiblesResult->anyType[5]);
            $resul->setResponseAny($responseClient->ObtieneTimbresDisponiblesResult->anyType);
            return $resul;
        } catch (Exception $ex) {
            $resul->setTypeResponse('InfoTimbresEmisor');
            $resul->setCodeResponse($ex->getCode());
            $resul->setMessageResponse($ex->getMessage());
            $resul->setTimbresContratados(0);
            $resul->setTimbresConsumidos(0);
            $resul->setTimbresDisponibles(0);
            $resul->setResponseAny(array());
            return $resul;
        }
    }
}
