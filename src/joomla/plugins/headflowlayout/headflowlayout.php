<?php

// no direct access
defined('_JEXEC') or die('Restricted access');

// Import library dependencies
jimport('joomla.plugin.plugin');

class plgSystemHeadflowlayout extends JPlugin {

    /**
     * Constructor
     *
     * For php4 compatability we must not use the __constructor as a constructor for
     * plugins because func_get_args ( void ) returns a copy of all passed arguments
     * NOT references.  This causes problems with cross-referencing necessary for the
     * observer design pattern.
     */
    function plgSystemHeadflowlayout(& $subject, $config) {
        parent::__construct($subject, $config);
    }

    /**
     * Plugin method with the same name as the event will be called automatically.
     */
    function onAfterRoute() {

        if(!class_exists('JModuleHelper')){
            define('HEADFLOW_ACTIVE', true);
          //  require_once 'headflowoverride.php';
        }else{
            // FIXME: signal some type of error
        }

        $app = &JFactory::getApplication();

        $document = & JFactory::getDocument();

        $doctype = $document->getType();

        // Only render for HTML output and client side
        $user =& JFactory::getUser();

       // if($user->usertype != "Super Administrator" && $user->usertype != "Administrator"){
       //     return;
       // }

        if ($doctype !== 'html' || $app->isAdmin()) {
            return;
        }

        /* * * Make sure we don't replace the Joomla __autoload funciton * * */

        if (function_exists('__autoload'))
            spl_autoload_register('__autoload');

        // Bootstrap application
        require_once JPATH_LIBRARIES . DIRECTORY_SEPARATOR . 'headflow' . DIRECTORY_SEPARATOR . 'Bootstrap.php';

        $request = new \slinks\core\controller\Request();

        $request->setActionPath('LayoutManager_includeJavascript');

        $result = \slinks\Slinks::getInstance()->getService('slinksActionManager')->handle($request);

        JResponse::setBody(preg_replace('<</body>>', trim($result).'</body>', JResponse::getBody()));


        return true;
    }

    function onAfterRender(){
        $app = &JFactory::getApplication();

        $document = & JFactory::getDocument();

        $doctype = $document->getType();

        // Only render for HTML output and client side
        $user =& JFactory::getUser();

       // if($user->usertype != "Super Administrator" && $user->usertype != "Administrator"){
       //     return;
       // }

        if ($doctype !== 'html' || $app->isAdmin()) {
            return;
        }

        $request = new \slinks\core\controller\Request();

        $request->setActionPath('LayoutManager_main');

        $result = \slinks\Slinks::getInstance()->getService('slinksActionManager')->handle($request);

        JResponse::setBody(preg_replace('<</body>>', trim($result).'</body>', JResponse::getBody()));

        return true;
    }

}

?>
