<?php

namespace Core;

class Application {
    // App config
    private $name = 'elsearch';
    private $routeData;
    private $appController;

    public function initApplication(){
        $this->routeData = \Core\Route::getInstance()->getRoute();

        xdebug_var_dump($this->routeData);
        
        $this->getController($this->routeData['controller']);
        return 0;
    }
   
    private function getController($controllerLabel){
        $controllerPath = '\Controllers\\'. $controllerLabel;
        $this->appController = new $controllerPath;
        $this->appController->initController($this->routeData);
        return 0;       
    }
}

