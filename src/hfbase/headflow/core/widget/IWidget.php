<?php
namespace headflow\core\widget;

/**
 * Description of IWidget
 *
 * @author navid
 */
interface IWidget {

    public function getId();
    
    public function setPageContext(IPageContext $pageContext);

    public function setParent(IWidget $parent);

    /**
     * This is called after widget is completely initialized and all of the markup has been created.
     * But before the widget is rendered.
     * This will always be called even if the markup has been cached.
     */
    public function preRender();

    public function getTemplateString();
    
}
