<?php
namespace headflow\core\widget;

use slinks\common\util\ObjectUtil;

/**
 * Description of Widget
 *
 * @author navid
 */
abstract class Widget implements IWidget{
   
    /**
     * The current page context. 
     * @var IPageContext
     */
    protected $pageContext;

    /**
     * The parent to this widget if within a container.
     * @var IWidget
     */
    protected $parent = null;
    
    /**
     * The unique id for this widget.
     * @var string
     */
    private $id=null;

    private $type; 
    
    /**
     * Construct a new widget
     * @param array $options optional array of options. The options are used to intialize this widget. Any option with a cooresponding setter will be used.
     */
    public function  __construct($options=array()) {

        ObjectUtil::initializeWithSetters($this,$options);
        $cls = get_class($this);
        $this->type = str_replace('\\', '_', $cls);
        if(isset($options['id'])){
            $this->id= $options['id'];
        }else{
            $this->id = \uniqid($this->type);
        }
    }

    /**
     * Empty implementation to allow subclasses to ignore if desired.
     */
    public function preRender() {}
    
    /**
     * The unique Id for this widget.
     * @return string
     */
    public function getId() {
        return $this->id;
    }

    /**
     *
     * @return IPageContext
     */
    public function getPageContext() {
        return $this->pageContext;
    }

    public function setPageContext(IPageContext $pageContext) {
        $this->pageContext = $pageContext;
    }

    /**
     *
     * @return IWidget
     */
    public function getParent() {
        return $this->parent;
    }

    public function setParent(IWidget $parent) {
        $this->parent = $parent;
    }

}
