<?php

namespace headflow\extensions\widget;

use slinks\core\DependencyInjection\Resource\FileResource;
use slinks\common\io\AnnotationReader;
use slinks\core\dependencyInjectionExt\extension\Extension;
use slinks\core\DependencyInjection\ContainerBuilder;

/**
 * Allows Widgets to be registered.
 * @author Navid Mitchell
 */
class WidgetExtension extends Extension {

    /**
     * Loads Widgets using the specified paths.
     *
     * Usage example:
     *
     *      <widget:register dojoNamespace="" path=""/>
     *
     * @param array $config An array of configuration settings
     * @param ContainerBuilder $container A ContainerBuilder instance
     */
    public function scanLoad($config, ContainerBuilder $container) {

     
    }

    /**
     * Returns the base path for the XSD files.
     *
     * @return string The XSD base path
     */
    public function getXsdValidationBasePath() {
        return __DIR__ . '/schema';
    }

    /**
     * Returns the namespace to be used for this extension (XML namespace).
     *
     * @return string The XML namespace
     */
    public function getNamespace() {
        return 'http://www.headflow.com/schema/dic/widget';
    }

    /**
     * Returns the recommended alias to use in XML.
     *
     * This alias is also the mandatory prefix to use when using YAML.
     *
     * @return string The alias
     */
    public function getAlias() {
        return 'widget';
    }

}

