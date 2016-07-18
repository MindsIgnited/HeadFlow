<?php
namespace headflow\core\widget\layout;

use \headflow\core\widget\ContainerWidget;
use \headflow\core\widget\Widget;

/**
 * Description of GridLayoutWidget
 *
 * @author navid
 */
class GridLayout extends ContainerWidget{

    private $gridClass='headFlowGrid';

    public function getBeginChildString() {
        return '<div>';
    }

    public function getBeginTemplateString() {
        return '<div class="{{this.gridClass}}">';
    }

    public function getEndChildString() {
        return '</div>';
    }

    public function getEndTemplateString() {
        return '</div>';
    }

    public function getGridClass() {
        return $this->gridClass;
    }

    public function setGridClass($gridClass) {
        $this->gridClass = $gridClass;
    }


}
