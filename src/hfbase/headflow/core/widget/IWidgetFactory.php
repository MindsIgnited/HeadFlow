<?php

namespace headflow\core\widget;

/**
 * Responsible for creating IWidget instances for rendering.
 * @author navid
 */
interface IWidgetFactory {
    
    /**
     * Creates a IWidget for the given name.
     * @param string $name the name of the widget to create. IE: Image. The name is not case sensitive. 
     * @param the array of options to pass to the widget during creation.
     * @return the instance of the IWidget requested.
     */
    public function create($name,$options=array());
    
    
}

?>
