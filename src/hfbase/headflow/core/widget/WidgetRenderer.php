<?php
namespace headflow\core\widget;

use \slinks\core\Templating\EngineInterface;

/**
 * Description of WidgetRenderer
 *
 * @author navid
 * @Service('headflowWidgetRenderer')
 */
class WidgetRenderer {
    
    /**
     *
     * @var \slinks\core\Templating\EngineInterface
     */
    private $engine;

    /**
     *
     * @var WidgetTemplateLoader
     */
    private $loader;

    /**
     *
     * @param WidgetTemplateLoader $loader
     * @param \slinks\extensions\twig\core\TwigEngine $twig 
     * 
     * @Inject
     */
    public function __construct(WidgetTemplateLoader $loader, EngineInterface $engine) {
        $this->engine = $engine;
        $this->loader = $loader;
    }
    

    /**
     * Renders a given widget markup.
     * @param IWidget $widget to render.
     * @return widget generated markup as a string.
     */
    public function render(IWidget $widget){
        $this->loader->addWidget($widget);

        $widget->preRender();
        
        return $this->engine->render($widget->getId().'.gzm', array('this'=>$widget,$widget->getId()=>$widget));
    }
   
    

}
