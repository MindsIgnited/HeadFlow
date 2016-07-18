<?php

namespace layoutmanager\actions;

use \headflow\core\util\ResourceUtil;

/**
 * Description of LayoutManager
 *
 * @author navid
 * @Action(actionPath="LayoutManager_")
 */
class LayoutManager {

    private $resourceUtil;

    /**
     * @param ResourceUtil $resourceUtil
     * @Inject
     */
    function __construct(ResourceUtil $resourceUtil) {
        $this->resourceUtil = $resourceUtil;
    }

    /**
     * @Action(actionPath='LayoutManager_includeJavascript',results=@Result(name='success', type='nothing'))
     */
    public function includeJavascript() {
        $this->resourceUtil->addHeadFlowBasePathVar();
        $this->resourceUtil->addDojo();

        $this->resourceUtil->addHeadFlowCss('dependencies/js/dojo-release-1.6.0-src/dojox/layout/resources/FloatingPane.css');
        $this->resourceUtil->addHeadFlowCss('dependencies/js/dojo-release-1.6.0-src/dojox/layout/resources/ResizeHandle.css');
        $this->resourceUtil->addHeadFlowCss('component/layoutmanager/view/css/LayoutManager.css');

        $this->resourceUtil->addHeadFlowJavascript('component/layoutmanager/view/js/Main2.js');

        return 'success';
    }


    /**
     * @Action(actionPath='LayoutManager_main',results=@Result(name='success', value='main.twig'))
     */
    public function main() {
        return 'success';
    }

    /**
     * @Action(actionPath='LayoutManager_getWidgets',interceptorStack='restfull')
     */
    public function getWidgets(){
        return array('Test','Test3','test2');
    }

}
