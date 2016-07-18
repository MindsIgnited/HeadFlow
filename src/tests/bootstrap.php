<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @author navid
 */
// TODO: check include path
ini_set('include_path', ini_get('include_path').PATH_SEPARATOR.dirname(__FILE__).'/../../${php.global.include.path}');

// put your code here
require_once 'TestConstants.php';

// HeadFlow For tests.
require_once dirname(__FILE__) . '/../hfbase/headflow/HeadFlow.php';

$hf = new HeadFlow();
$hf->setCacheDir(TestConstants::getCacheDir());
$hf->initialize();

// FIXME: All Widget's need this to be called first to setup redbean move to container.
\slinks\Slinks::getInstance()->getService('headflowWidgetRenderer');

?>
