<?php 

namespace codegeneration;

use slinks\common\addendum\ReflectionAnnotatedClass;

class DaoParameterGenerator implements IParameterGenerator{
	
	
	/**
	 * @param ReflectionAnnotatedClass $clazz the class to generate a template for.
	 * @return array the array of parameters for the template. 
	 */
	function getParameters(ReflectionAnnotatedClass $clazz){
		return array('entityName' => $clazz->getShortName(), 'entityClass' => $clazz->getName(),'entityAlias' => lcfirst($clazz->getShortName()));
	}
	
}