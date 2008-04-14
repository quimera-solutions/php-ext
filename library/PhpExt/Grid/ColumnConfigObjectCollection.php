<?php
/**
 * PHP-Ext Library
 * http://php-ext.googlecode.com
 * @author Sergei Walter <sergeiw[at]gmail[dot]com>
 * @copyright 2008 Sergei Walter
 * @license http://www.gnu.org/licenses/lgpl.html
 * @link http://php-ext.googlecode.com
 * 
 * Reference for Ext JS: http://extjs.com
 * 
 */
/**
 * @see PhpExt_ObjectCollection
 */
include_once 'PhpExt/ObjectCollection.php';
/**
 * @see PhpExt_Grid_ColumnConfigObject
 */
include_once 'PhpExt/Grid/ColumnConfigObject.php';


/**
 * Provides functionality to manage a PhpExt_Grid_ColumnConfigObject Collection
 * 
 * @package PhpExt
 * @subpackage Grid
 */
class PhpExt_Grid_ColumnConfigObjectCollection extends PhpExt_ObjectCollection 
{
	
	public function __construct($collection = array()) {
		parent::__construct($collection);			
	}
	
	/**
	 * Adds a PhpExt_Grid_ColumnConfigObject to the Collection
	 *
	 * @param PhpExt_Grid_ColumnConfigObject $object
	 * @param string $name
	 * @return int the index of the new element
	 */
	public function add(PhpExt_Grid_ColumnConfigObject $object, $name = null) {
		return $this->addObject($object, $name);
	}
	
	/**
	 * Gets the Component with the key specified by $name
	 *
	 * @param string $name
	 * @return PhpExt_Grid_ColumnConfigObject
	 */
	public function getByName($name) {
		return $this->getObjectByName($name);
	}
	
	/**
	 * Gets the Component in the specified index
	 *
	 * @param int $index
	 * @return PhpExt_Grid_ColumnConfigObject
	 */
	public function &getByIndex($index) {
		return $this->getObjectByIndex($index);
	}
			
}


