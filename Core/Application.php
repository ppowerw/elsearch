<?php

namespace Core;

class Application {
    // App config
    private $name = 'elsearch';
    private $routeData;
    private $appController;

    public function initApplication(){
        $this->routeData = \Core\Router::getInstance()->getRoute();

        xdebug_var_dump($this->routeData);
        
        $this->getController($this->routeData['controller']);
        return 0;
    }
   
    private function getController($controllerLabel){
        $controllerPath = '\Controllers\\'. $controllerLabel;
        $this->appController = new $controllerPath;
        $this->appController->initController($this->routeData);        
        
        $dataArr = [
            'Array for test Logger',
            'user'=>'test@example.com',
            'order'=>[
                'items' =>[
                    "m15671",
                    "m2437822",
                    "m362353"
                    ],
                'cost' => '233.3'
                ],
            $this->appController
            ];
        \Libs\Logger::doLog()->toScreen($dataArr);
        print_r ($dataArr);
        //\Libs\Logger::doLog()->toFile($dataArr);
        
        return 0;       
    }
}

