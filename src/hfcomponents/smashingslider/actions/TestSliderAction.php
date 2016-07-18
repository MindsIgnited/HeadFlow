<?php

namespace headflow\component\smashingslider\actions;

use headflow\core\util\ResourceUtil;

/**
 * 
 * @author Navid Mitchell
 * 
 * @Results({@Result(name="success",value="test.html")})
 */
class TestSliderAction {

    private $resourceUtil;

    /**
     * @param ResourceUtil $resourceUtil
     * @Inject
     */
    function __construct(ResourceUtil $resourceUtil) {
        $this->resourceUtil = $resourceUtil;
    }

    /**
     * @Action(actionPath="TestSlider_render")
     */
    public function render() {

        $this->resourceUtil->addJQuery();
        $this->resourceUtil->addHeadFlowCss('component/smashingslider/view/javascript/AnythingSlider/css/anythingslider.css');
        $this->resourceUtil->addHeadFlowJavascript('component/smashingslider/view/javascript/AnythingSlider/js/jquery.easing.1.2.js');
        $this->resourceUtil->addHeadFlowJavascript('component/smashingslider/view/javascript/AnythingSlider/js/jquery.anythingslider.min.js');
        $this->resourceUtil->addHeadFlowJavascript('component/smashingslider/view/javascript/AnythingSlider/js/jquery.anythingslider.fx.min.js');

        return 'success';
    }

    public function renderMarket() {
        jimport('joomla.application.module.helper');
        $module = \JModuleHelper::getModule('rokstock', 'MARKETQUOTE');
        $attribs['style'] = 'xhtml';
        return \JModuleHelper::renderModule($module, $attribs);
    }

}