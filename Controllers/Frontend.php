<?php

namespace Controllers;

class Frontend{
    
    private $routeData;

    // Define allowed actions as site pages
    private $actionList = [
        'ViewHome', //Default action 
        'ViewUsers',
        'ViewItems',
        'AddItems',
        'DeleteItems'
    ];
    
    public function initController($routeData){
        echo PHP_EOL. "<br/> Init controller >> " . __CLASS__;
        
        $this->routeData = $routeData;
        $this->checkAction($this->routeData['action']);
        
        echo PHP_EOL. "<br/> Set action >> " . $this->routeData['action'];
        
        $this->doAction($this->routeData['action']);        
        return 0;
    }
    
    private function checkAction($actionName){
        // Setting defalut action for unknown action
        $searchAction = array_search(strtolower($actionName), $this->actionList);
        if (!$searchAction === 0){
            $this->routeData['action'] = $this->actionList[1];
            return 1;
        }
        $this->routeData['action'] = $this->actionList[$searchAction];
        return 0;
    }
    
    private function doAction($action){
        $needleFunction = 'doAction'.$action;
        if (!method_exists($this,$needleFunction)){
            echo PHP_EOL. '<br/> For action "'.$action.'" function $needleFunction doesn\'t exist';
        }else{
            echo PHP_EOL. '<br/> For action "'.$action.'" function $needleFunction exists';
            $this->$needleFunction();
        }
    }
    
    private function doActionViewHome(){
        // getTemplate
        // getDefinedData
        // getData
        // renderPage
        
        ob_start();
        include '\Templates\Frontend\Home.html';
        $pageContents = ob_get_clean();
        $pageDefinedData = \Views\Page::getVarsFormHTML($pageContents);
        var_dump("HTML template definedData",$pageDefinedData); 
    }
    
}

