<?php
namespace headflow\core\widget;

use slinks\extensions\twig\core\ITwigTemplateLoader;

/**
 * Description of WidgetTemplateLoader
 *
 * @author navid
 * @Service
 */
class WidgetTemplateLoader implements ITwigTemplateLoader {

    private $widgets = array();
    protected function getWidgetsForBeans($beans){
        
    }
    public function addWidget(IWidget $widget){
        $this->widgets[$widget->getId().'.gzm'] = $widget;
    }

    public function getCacheKey($name) {
        return $name;
    }

    public function getSource($name) {
        $src = $this->widgets[$name]->getTemplateString();
        return $src;
    }

    public function isFresh($name, $time) {
        return true;
    }
    
    public function getTemplateSuffix() {
        return 'gzm';
    }

}
