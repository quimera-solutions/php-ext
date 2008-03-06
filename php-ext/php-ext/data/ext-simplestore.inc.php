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
 * 
 */
include_once realpath(dirname(__FILE__)."/ext-store.inc.php");
include_once realpath(dirname(__FILE__)."/../ext-objectcollection.inc.php");

/**
 * @package php-ext
 * @subpackage data
 */
class ExtSimpleStore extends ExtStore
{
	/**
	 * @var ExtObjectCollection
	 */
	var $Fields = null;
	var $Id = null;
	
	function ExtSimpleStore() {
		ExtSimpleStore::ExtStore();

		$this->setExtClassInfo("Ext.data.SimpleStore");

		$this->Fields = new ExtObjectCollection();
	}	
	
	/**
	 * @param $field string
	 */
	function &addField($field) {
		$this->Fields->addObject($field);
		return $field;
	}
	
	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);

		if ($this->Fields->getCount() > 0)
			$params[] = $this->paramToString("fields",$this->Fields);
		if ($this->Id != null)
			$params[] = $this->paramToString("id",$this->Id);
			
		return $params;
	}
 	
	
}

?>