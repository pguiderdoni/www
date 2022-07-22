<?php

class Adaptateur{
    public static function xmlToJson($data){
        $xml = simplexml_load_string($data);
        $json = json_encode($xml);
        return $json;
    }
}
