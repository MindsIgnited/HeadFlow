<?php

namespace codegeneration;

use slinks\common\addendum\Addendum;
use slinks\common\addendum\ReflectionAnnotatedClass;
use slinks\common\io\IAnnotationVisitor;
use slinks\core\DependencyInjection\ParameterBag\ParameterBag;

class CodeGenerationVisitor implements IAnnotationVisitor {

    /**
     * @var array of CodeGenerationConfig(s)
     */
    private $codeGenerationConfigs;
    /**
     * @var Smarty
     */
    private $smarty;

    /**
     * Construct a new CodeGenerationClassVisitor
     * @param array $codeGenerationConfigs
     */
    function __construct(array $codeGenerationConfigs) {
        $this->codeGenerationConfigs = $codeGenerationConfigs;

        require_once('Smarty/Smarty.class.php');

        $this->smarty = new \Smarty();

        $this->smarty->debugging = false;
        $this->smarty->caching = false;

        $this->smarty->template_dir = 'templates/';
        $this->smarty->compile_dir = 'temp/';
        $this->smarty->cache_dir = 'temp/';
        $this->smarty->addPluginsDir(array('smartyplugins/'));

        $this->smarty->left_delimiter = '<!';
        $this->smarty->right_delimiter = '!>';

        include_once 'annotations/Entity.php';

        // register the shortcut Annotation names with the Addendum
        Addendum::registerClass('Entity', '\codegeneration\annotations\Entity');
    }

    /**
     * This is called by the AnnotationReader when it reaches a new Class containing annotations in the filesytem.
     * @param string $annotationInfo the ReflectionAnnotatedClass for the class containing the Annotations.
     * 		  This is part of the Addendum project http://code.google.com/p/addendum/
     */
    public function visit(ReflectionAnnotatedClass $annotationInfo) {

        if ($annotationInfo->hasAnnotation('Entity')) {
            foreach ($this->codeGenerationConfigs as $config) {

                $params = $config->parameterGenerator->getParameters($annotationInfo);

                $this->smarty->clearAllAssign();

                $this->smarty->assign($params);

                $paramBag = new ParameterBag($params);

                $file = $paramBag->resolveValue($config->fileOutputPath);

                if ($config->replaceFileIfExists || !file_exists($file)) {
                    file_put_contents($file, $this->smarty->fetch($config->template));
                }
            }
        }
    }

}

?>