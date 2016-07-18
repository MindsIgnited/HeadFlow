<?php /* Smarty version Smarty3-RC3, created on 2011-03-20 14:17:51
         compiled from "templates/Dao.stpl" */ ?>
<?php /*%%SmartyHeaderCode:3179829774d8660ef9f2c72-36354577%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c75399712b44bce051e746d0a3e7b2b2862acc62' => 
    array (
      0 => 'templates/Dao.stpl',
      1 => 1300652236,
    ),
  ),
  'nocache_hash' => '3179829774d8660ef9f2c72-36354577',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<<?php ?>?php 
namespace headflow\core\joomla\dao;

/**
 * Auto Generated concrete DAO class for <?php echo $_smarty_tpl->getVariable('entityClass')->value;?>
 objects. 
 * This class will only be gernerated if it does not exisist. It is safe to add modifications here. 
 *
 * @author Navid Mitchell
 *
 * @Service
 */
class <?php echo $_smarty_tpl->getVariable('entityName')->value;?>
DAO extends abs\Abstract<?php echo $_smarty_tpl->getVariable('entityName')->value;?>
DAO{

 	/**
	 * @Inject
	 */
 	function __construct($entityManager){
 		parent::__construct($entityManager);
 	}

}