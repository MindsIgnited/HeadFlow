<?php 

namespace codegeneration;

use slinks\common\addendum\ReflectionAnnotatedClass;

class ServiceParameterGenerator implements IParameterGenerator{
	
	private $daoNamespace;
	
	function __construct($daoNamespace){
		$this->daoNamespace = $daoNamespace;
	}
	
	
	/**
	 * @param ReflectionAnnotatedClass $clazz the class to generate a template for.
	 * @return array the array of parameters for the template. 
	 */
	function getParameters(ReflectionAnnotatedClass $clazz){
		
		// we want to use all of the methods from any corresponding DAO method that may exisit for the Entity
		$daoParameterName = lcfirst($clazz->getShortName()) . 'DAO';
		$daoClassName = $this->daoNamespace . '\\'.$clazz->getShortName().'DAO';
		$daoClass = new \ReflectionClass($daoClassName);
		
		return array('entityName' => $clazz->getShortName(), 
					 'entityClass' => $clazz->getName(),
					 'daoClassName' => $daoClassName,
					 'daoParameterName' => $daoParameterName,
					 'methods' => $daoClass->getMethods());
	}
	
}
