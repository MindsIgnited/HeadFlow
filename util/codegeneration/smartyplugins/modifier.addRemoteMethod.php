<?php
	/*
	 * Smarty plugin
	 * -------------------------------------------------------------
	 * File:     modifier.addRemoteMethod.php
	 * Type:     modifier
	 * Name:     addRemoteMethod
	 * Purpose:  adds a @RemoteMethod to the end of a Existing Doc Block comment.
	 * -------------------------------------------------------------
	 */
	function smarty_modifier_addRemoteMethod($string){
	    return str_replace("*/", "* @RemoteMethod\n     */", $string);   
	}

?>