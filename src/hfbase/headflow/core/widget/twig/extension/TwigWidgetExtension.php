<?php
namespace headflow\core\widget\twig\extension;


/**
 * Description of TwigWidgetExtension
 *
 * @author navid
 * @Service()
 * @Scope(public=false)
 */
class TwigWidgetExtension extends \Twig_Extension{
      
    /**
     * Returns the token parser instance to add to the existing list.
     *
     * @return array An array of Twig_TokenParser instances
     */
    public function getTokenParsers()
    {
        return array(
            new \headflow\core\widget\twig\WidgetTokenParser()
        );
    }
    
    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    function getName(){
        return "widget";
    }
    
}
