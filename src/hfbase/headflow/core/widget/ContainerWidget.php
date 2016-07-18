<?php

namespace headflow\core\widget;

/**
 * Description of WidgetContainer
 *
 * @author navid
 */
abstract class ContainerWidget extends Widget {
    
    private $children = array();
    
    public abstract function getBeginTemplateString();
    
    public abstract function getEndTemplateString();

    public abstract function getBeginChildString();
    
    public abstract function getEndChildString();

    public function __construct($options = array()) {
        parent::__construct($options);
    }

    public function setPageContext(IPageContext $pageContext) {
        parent::setPageContext($pageContext);

        foreach ($this->children as $value) {
            $value->setPageContext($pageContext);
        }
    }

    public function preRender() {
        parent::preRender();
        
        foreach ($this->children as $value) {
            $value->preRender();
        }
    }

    /**
     * Adds a child to this container.
     * @param IWidget $widget
     * @return WidgetContainer
     */
    public function addChild(IWidget $widget){
        $widget->setParent($this);
        $this->children[$widget->getId()] = $widget;
        return $this;
    }
    
    final public function getTemplateString() {
        $ret=$this->getBeginTemplateString();
        foreach ($this->children as $key => $value) {
            $ret .= $this->getBeginChildString();
            $ret .= "{% set {$key} = this.children['{$key}'] %}";
            $ret .= "{% set this = {$key} %}";
            $ret .= $value->getTemplateString();
            $ret .= "{% set this = {$this->getId()} %}";
            $ret .= $this->getEndChildString();
        }
        $ret .= $this->getEndTemplateString();
        return $ret;
    }
    
    public function getChildren() {
        return $this->children;
    }


}
