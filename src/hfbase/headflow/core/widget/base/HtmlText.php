<?php
namespace headflow\core\widget\base;
use \headflow\core\widget\Widget;
/**
 * Description of HtmlText
 *
 * @author navid
 */
class HtmlText extends Widget{
    
    public function __construct($options=array()) {
        parent::__construct($options);
        $this->store->text="";
    }
    
    public function getTemplateString() {
        
    }

   
}
