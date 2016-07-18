<?php
namespace headflow\core\widget\twig;
    
/**
 * Description of WidgetTokenParser
 *
 * @author navid
 */
class WidgetTokenParser extends \Twig_TokenParser {
    
  
    
    
    public function getTag() {
        return "image";
    }

    public function parse(Twig_Token $token) {
        
    }

}
