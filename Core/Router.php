<?php

namespace Core;

/*
 *  Class for parsing data in request
 */

class Router {

    private static $instance = null;
    private $requestURI;
    private $routeData;
    private $labelController;
    private $labelAction;
    private $paramsArray = [];

    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new Router();
        }
        return self::$instance;
    }

    private function __clone() {
        
    }

    private function __construct() {
        
    }

    public function getRoute() {
        $this->parseRequest(); //parse Query params
        $this->routeData['controller'] = $this->getLabelController();
        $this->routeData['action'] = $this->getLabelAction();
        $this->routeData['params'] = $this->getParamsArray();           
        return $this->routeData;
    }

    private function parseRequest() {
        $this->requestURI = \Libs\InputFilter::getLib()->getGlobal('REQUEST_URI', 'SERVER');
    }

    private function getLabelController() {
        $this->labelController = 'frontend';
        return $this->labelController;
    }

    private function getLabelAction() {
        $this->labelAction = 'viewhome';
        return $this->labelAction;
    }

    private function getParamsArray() {
        $this->paramsArray = [
            'params1' => 'value1'
        ];
        return $this->paramsArray;
    }
}
