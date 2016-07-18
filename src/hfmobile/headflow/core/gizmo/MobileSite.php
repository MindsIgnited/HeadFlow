<?php
namespace headflow\core;
use \headflow\core\widget\WidgetContainer;

/**
 * Description of MobileSite
 *
 * @author navid
 */
class MobileSite extends WidgetContainer {
  
    public function getBeginTemplateString() {
        return '';
    }
    
    public function getBeginChildString() {
        return '<div data-role="page" data-theme="z">';
    }

    public function getEndChildString() {
        return '</div>';
    }

    public function getEndTemplateString() {
        return '';
    }
    
}
