<?php
	/*
	 * Smarty plugin
	 * -------------------------------------------------------------
	 * File:     modifier.addDefaultParameter.php
	 * Type:     modifier
	 * Name:     addDefaultParameter
	 * Purpose:  adds a default parameter value string for optional parameters.
	 * 		     Expects a ReflectionParameter object and will render the default value  if the parameter is optional. Does nothing if the parameter is not optional.
	 * -------------------------------------------------------------
	 */
	function smarty_modifier_addDefaultParameter($string,\ReflectionParameter $param){
	    if($param->isOptional()){
	    	
	    	$value = $param->getDefaultValue();
	    	$valueStr = (string) $value;
	    	
	    	if($value == null){
	    		$valueStr = 'null';
	    	}else if(is_string($value)){
	    		$valueStr = "'" . $value . "'"; 
	    	}
	    	
	    	$string = $string . ' = ' . $valueStr;
	    }  
	    return $string;
	}
	

?>