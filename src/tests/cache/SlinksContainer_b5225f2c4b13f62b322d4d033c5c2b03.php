<?php
use slinks\core\DependencyInjection\ContainerInterface;
use slinks\core\DependencyInjection\Container;
use slinks\core\DependencyInjection\Reference;
use slinks\core\DependencyInjection\Parameter;
use slinks\core\DependencyInjection\ParameterBag\FrozenParameterBag;
class SlinksContainer_b5225f2c4b13f62b322d4d033c5c2b03 extends Container {
    public function __construct() {
        parent::__construct(new FrozenParameterBag($this->getDefaultParameters())); }
    protected function getGizmomanagerService() {
        return $this->services['gizmomanager'] = new \headflow\core\gizmo\GizmoManager(); }
    protected function getHeadflowgizmorendererService() {
        $this->services['headflowgizmorenderer'] = $instance = new \headflow\core\gizmo\GizmoRenderer();
        $instance->create(false, '/home/navid/www/htdocs/ecommerce/HeadFlow/src/tests/cache');
        return $instance; }
    protected function getHeadflow_Core_Util_ResourceutilService() {
        return $this->services['headflow.core.util.resourceutil'] = new \headflow\core\util\ResourceUtil(new \slinks\extensions\onecms\cms\joomla\JoomlaResourceManager()); }
    protected function getDefaultParameters() {
        return array(
            'root.dir' => '/home/navid/www/htdocs/ecommerce/HeadFlow/src/hfbase/headflow',
            'additional.service.dir' => NULL,
            'slinks.container.id' => 'default',
            'slinks.cache.dir' => '/home/navid/www/htdocs/ecommerce/HeadFlow/src/tests/cache',
            'slinks.debug.enabled' => false,
            'slinks.config.root.dir' => '/home/navid/www/htdocs/ecommerce/HeadFlow/src/hfbase/headflow',
        ); } }
