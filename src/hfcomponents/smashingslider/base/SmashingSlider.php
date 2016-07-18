<?php
namespace headflow\component\smashingslider;

use  \headflow\core\widget\WidgetContainer;

/**
 * Description of SmashingSlider
 *
 * @author navid
 */
class SmashingSlider extends WidgetContainer{

    public function getBeginChildString() {
        return '<li>';
    }

    public function getBeginTemplateString() {
        $ret = '<script type="text/javascript">';
        $ret .= file_get_contents('js'.\DIRECTORY_SEPARATOR.'smashingslider.js');
        $ret .= '</script>';
        $ret .= '<ul id="{{this.id}}" >';
    }

    public function getEndChildString() {
        return '</li>';
    }

    public function getEndTemplateString() {
        return '</ul>';
    }

}
