<?php /* Smarty version Smarty3-RC3, created on 2011-03-20 17:08:18
         compiled from "templates/AbstractDao.stpl" */ ?>
<?php /*%%SmartyHeaderCode:5190528974d8688e2550d50-36821035%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7601d2e041d23f3be9307c9b2346d8e075428c5' => 
    array (
      0 => 'templates/AbstractDao.stpl',
      1 => 1300662441,
    ),
  ),
  'nocache_hash' => '5190528974d8688e2550d50-36821035',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<<?php ?>?php 
namespace headflow\core\joomla\dao\abs;

/**
 * Auto Generated Base DAO class for <?php echo $_smarty_tpl->getVariable('entityClass')->value;?>
 objects. 
 * Do Not Modify!
 *
 * @author Navid Mitchell
 */
abstract class Abstract<?php echo $_smarty_tpl->getVariable('entityName')->value;?>
DAO {

	/**
	 * The Doctrine entity manager.
	 * @var $entityManager ORM\EntityManager
	 */
	protected $entityManager;

 	function __construct($entityManager){
 		$this->entityManager = $entityManager;
 	}


	/**
	 * Returns the number of rows in the table.
	 * @param $callback if set allows should provide a function that expects the Doctrine\ORM\QueryBuilder as a single argument.  EX: "function callback(Doctrine\ORM\QueryBuilder &$qb)"
	 * This allow you to supply custom conditions ect. The Enitity table should always be referred to as "<?php echo $_smarty_tpl->getVariable('entityAlias')->value;?>
" when using the Doctrine\ORM\QueryBuilder. 
	 * @return int the entity count 
	 */
	public function count($callback = null) {
			
		$qb = $this->entityManager->createQueryBuilder();	
							  
		$qb = $qb->select($qb->expr()->count('*'))
		   		  ->from('<?php echo $_smarty_tpl->getVariable('entityClass')->value;?>
', '<?php echo $_smarty_tpl->getVariable('entityAlias')->value;?>
');
		   		  
		if(isset($callback)){
			$callback($qb);
		}   		  
		
		$rs = $qb->getQuery()->getArrayResult();					  
								  
		return $rs[0];						  
	}


	/**
	 * Returns all the rows from the table.
	 * @param $callback if set allows should provide a function that expects the Doctrine\ORM\QueryBuilder as a single argument.  EX: "function callback(Doctrine\ORM\QueryBuilder &$qb)"
	 * This allow you to supply custom conditions ect. The Enitity table should always be referred to as "<?php echo $_smarty_tpl->getVariable('entityAlias')->value;?>
" when using the Doctrine\ORM\QueryBuilder. 
	 * @return array
	 */
	public function findAll($callback=null) {
		
		$qb = $this->entityManager->createQueryBuilder();	
							  
		$qb = $qb->select('<?php echo $_smarty_tpl->getVariable('entityAlias')->value;?>
')
		   		  ->from('<?php echo $_smarty_tpl->getVariable('entityClass')->value;?>
', '<?php echo $_smarty_tpl->getVariable('entityAlias')->value;?>
');
		   		  
		if(isset($callback)){
			$callback($qb);
		}   		  
		
		return $qb->getQuery()->getResult();
	}
	

	/**
	 * Returns the item corresponding to the value specified for the primary key.
	 * @param int $id
	 * @return int
	 */
	public function findById($id) {
		return $this->entityManager->find('<?php echo $_smarty_tpl->getVariable('entityClass')->value;?>
', $id);
	}
	

	/**
	 * Returns $numItems rows starting from the $startIndex row from the 
	 * table.
	 * @param int $pageNumber the 
	 * @param int $itemsPerPage	 
	 * @param $callback if set allows should provide a function that expects the Doctrine\ORM\QueryBuilder as a single argument.  EX: "function callback(Doctrine\ORM\QueryBuilder &$qb)"
	 * This allow you to supply custom conditions ect. The Enitity table should always be referred to as "<?php echo $_smarty_tpl->getVariable('entityAlias')->value;?>
" when using the Doctrine\ORM\QueryBuilder. 
	 * @return array 
	 */
	public function findPage($pageNumber,$itemsPerPage = 25,$callback = null) {
		$qb = $this->entityManager->createQueryBuilder();	
							  
		$qb = $qb->select('<?php echo $_smarty_tpl->getVariable('entityAlias')->value;?>
')
		   		  ->from('<?php echo $_smarty_tpl->getVariable('entityClass')->value;?>
', '<?php echo $_smarty_tpl->getVariable('entityAlias')->value;?>
');
		   		  
		if(isset($callback)){
			$callback($qb);
		} 
		  
		return $qb->getQuery()->setFirstResult($pageNumber*$itemsPerPage)
							  ->setMaxResults($itemsPerPage)
							  ->getResult();
	}
	

	/**
	 * Returns the number of pages that exisit for the entitiy.
	 * @param $callback if set allows should provide a function that expects the Doctrine\ORM\QueryBuilder as a single argument.  EX: "function callback(Doctrine\ORM\QueryBuilder &$qb)"
	 * This allow you to supply custom conditions ect. The Enitity table should always be refered to as "<?php echo $_smarty_tpl->getVariable('entityAlias')->value;?>
" when using the Doctrine\ORM\QueryBuilder. 
	 * @return int the number of pages.
	 */
	public function pageCount($itemsPerPage,$callback = null){
		$val = count($callback);
		return $val / $itemsPerPage;
	}
	
	
	/**
	 * Deletes the item corresponding to the object from the table.
	 * @param <?php echo $_smarty_tpl->getVariable('entityClass')->value;?>
 $item
	 * @return void
	 */
	public function remove(\<?php echo $_smarty_tpl->getVariable('entityClass')->value;?>
 $item) {
		$this->entityManager->remove($item);
		
		$this->entityManager->flush();	
	}
	
	
	/**
	 * Updates the passed item in the table.
	 *
	 * @param <?php echo $_smarty_tpl->getVariable('entityClass')->value;?>
 $item
	 * @return void
	 */
	public function saveOrUpdate(\<?php echo $_smarty_tpl->getVariable('entityClass')->value;?>
 $item) {
		// see if this object is and should be managed by the enitity manager.
		if($item->getId() != null && !$this->entityManager->contains($item)){
			$item = $this->entityManager->merge($item);
		}
		
		$this->entityManager->persist($item);
		
		$this->entityManager->flush();
		
		return $item;
	}

}