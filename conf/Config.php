<?php

namespace conf;

class Config {

    //App config    
    protected static $App = [
        'hostname' => 'elsearch.local',
        'port' => '8090',
        'siteName' => 'Elsearch',
        'debug' => 1
    ];
    
    //DB config
    protected static $DB = [
        //'dbType' => 'MySQL',
        'dbHost' => 'localhost',
        'dbUser' => '',
        'dbPassword' => 'root',
        'dbName' => 'root',
        'dbPort' => '3306'
    ];

    public static function getAppConfig($value) {
        if (self::$App[$value]) {
            return self::$App[$value];
        }
        return null;
    }
    
    public static function getDBConfig($value) {
        if (self::$DB[$value]) {
            return self::$DB[$value];
        }
        return null;
    }

}
