<?php

namespace Views;

class Page{
    
    public static function getVarsFormHTML($contents){
        $searchResult =[];
        preg_match_all('|({{)(.*)(}})|', $contents, $searchResult);
        return $searchResult[2];
    }
}
