<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );


/*** Make sure we don't replace the Joomla __autoload funciton ***/

if (function_exists('__autoload')) spl_autoload_register( '__autoload' );

// Bootstrap application
require_once JPATH_LIBRARIES.DIRECTORY_SEPARATOR.'headflow'.DIRECTORY_SEPARATOR.'Bootstrap.php';

$task = JRequest::getCmd('task');

if(!empty($task)){
	
	$request = new \slinks\core\controller\Request();
	$request->setParameters(new \slinks\core\DependencyInjection\ParameterBag\ParameterBag($_REQUEST));
	$request->setActionPath($task);
	
	echo \slinks\Slinks::getInstance()->getService('slinksActionManager')->handle($request);
	
}else{
	
	echo 'Blaaaaaaaaaaaaaaahhhhhhhhhhhhhhhhhhhhhhh!!!!!!!';
	
}