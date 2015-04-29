<?php

namespace conf;

class Config {

//App config    
    protected $App = [
        'hostname' => 'elsearch.local',
        'port' => '8090',
        'siteName' => 'Elsearch',
        'debug' => 1
    ];
//DB config
    protected $DB = [
        //'dbType' => 'MySQL',
        'dbHost' => 'localhost',
        'dbUser' => '',
        'dbPassword' => 'root',
        'dbName' => 'root',
        'dbPort' => '3306'
    ];

    public function getconfig($configName) {
        if ($this->$configName) {
            return $this->$configName;
        }
        echo 'Undefined ConfigName';
        ob_flush();
        return 0;
    }

}
