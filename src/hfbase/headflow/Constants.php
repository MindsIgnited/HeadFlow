<?php

namespace headflow;

class Constants {

    public static function getRootDir() {
        return __DIR__;
    }

    public static function getJoomlaModelDir() {
        return __DIR__ . DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'joomla'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'data';
    }

    public static function getJoomlaModelProxyDir() {
        return __DIR__ .DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'joomla'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'proxies';
    }

    public static function getServiceDir() {
        return __DIR__ .DIRECTORY_SEPARATOR.'businesslogic'.DIRECTORY_SEPARATOR.'services';
    }

    public static function getJoomlaDAODir() {
        return __DIR__ .DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'joomla'.DIRECTORY_SEPARATOR.'dao';
    }

    public static function getExternalDir() {
        return dirname(dirname(__DIR__)). DIRECTORY_SEPARATOR.'dependencies';
    }

    
}

