<?php

require_once '../../src/headflow/Bootstrap.php';

date_default_timezone_set('America/Denver');

$loader = new \slinks\common\UniversalClassLoader();

$loader->registerNamespaces(array(
    'codegeneration'        =>  dirname(__DIR__)
));
$loader->register();


$daoDir = \headflow\Constants::getJoomlaDAODir();
$daoNamespace = 'headflow\\core\\joomla\\dao';

$replaceAll = false;

$reader = new \slinks\common\io\AnnotationReader(new \codegeneration\CodeGenerationVisitor(array(
                    new \codegeneration\CodeGenerationConfig('AbstractDao.stpl', $daoDir . '/abs/Abstract%entityName%DAO.php', new \codegeneration\DaoParameterGenerator(), true),
                    new \codegeneration\CodeGenerationConfig('Dao.stpl', $daoDir . '/%entityName%DAO.php', new \codegeneration\DaoParameterGenerator(), $replaceAll)
                )));
$finder = new slinks\common\Finder\Finder();
echo 'looking for files in ' . \headflow\Constants::getJoomlaModelDir();
$reader->read($finder->files()->name('*.php')->in(\headflow\Constants::getJoomlaModelDir()));
?>