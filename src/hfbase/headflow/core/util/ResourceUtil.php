<?php

namespace headflow\core\util;

use slinks\extensions\onecms\core\templating\IResourceManager;

/**
 * 
 * @author Navid Mitchell
 * @Service
 */
class ResourceUtil {

    private $resourceManager;

    /**
     * @param unknown_type $resourceManager
     * @Inject
     */
    function __construct(IResourceManager $resourceManager) {
        $this->resourceManager = $resourceManager;
    }

    public function addJQuery() {
        $this->addHeadFlowCss('dependencies/js/jquery-ui-1.8.9.custom/css/ui-lightness/jquery-ui-1.8.9.custom.css');
        $this->addHeadFlowJavascript('dependencies/js/jquery-ui-1.8.9.custom/js/jquery-1.4.4.min.js');
        $this->addHeadFlowJavascript('dependencies/js/jquery-ui-1.8.9.custom/js/jquery-ui-1.8.9.custom.min.js');
    }

    public function addJQueryToolsUI() {
        $this->resourceManager->addScript('http://cdn.jquerytools.org/1.2.5/tiny/jquery.tools.min.js');
    }

    public function addDojo() {
        $this->resourceManager->addStyleSheet($this->getBaseHeadFlowURL().'dependencies/js/dojo-release-1.6.0-src/dijit/themes/tundra/tundra.css');
        $this->resourceManager->addScript($this->getBaseHeadFlowURL().'dependencies/js/dojo-release-1.6.0-src/dojo/dojo.js');
       // $this->resourceManager->addScript('http://ajax.googleapis.com/ajax/libs/dojo/1.6/dojo/dojo.xd.js');
    }

    public function addHeadFlowJavascript($path) {
        $this->resourceManager->addScript($this->getBaseHeadFlowURL() . $path);
    }

    public function addHeadFlowCss($path) {
        $this->resourceManager->addStyleSheet($this->getBaseHeadFlowURL() . $path);
    }

    public function addHeadFlowBasePathVar(){
        $this->resourceManager->addScriptDeclaration("var HeadFlowBaseURL = '". $this->getBaseHeadFlowURL() ."';");
    }

    public function getBaseHeadFlowURL() {
        // FIXME Be smarter :)
        return $this->resourceManager->getBaseURL() . 'libraries/headflow/';
    }

}