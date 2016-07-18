<?php
/**
* Bootstrap file to be used if Headflow needs to be initialized by itself and not as a plugin to another slinks app.
* 
*/

// init Slinks
require_once('Constants.php');
require_once(\headflow\Constants::getExternalDir().DIRECTORY_SEPARATOR.'slinks'.DIRECTORY_SEPARATOR.'Slinks.php');
\slinks\Slinks::getInstance();
\slinks\Slinks::getInstance()->setDebugEnabled(true);
\slinks\Slinks::getInstance()->setCacheDirectory(\headflow\Constants::getRootDir().DIRECTORY_SEPARATOR.'cache');

// init headflow app
\slinks\Slinks::getInstance()->initialize(\headflow\Constants::getRootDir());