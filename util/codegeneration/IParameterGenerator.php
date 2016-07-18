<?php 

namespace codegeneration;

use slinks\common\addendum\ReflectionAnnotatedClass;

interface IParameterGenerator {
	
	/**
	 * 
	 * @param ReflectionAnnotatedClass $clazz the class to generate a template for.
	 * @return array the array of parameters for the template. 
	 */
	function getParameters(ReflectionAnnotatedClass $clazz);
		
	
}