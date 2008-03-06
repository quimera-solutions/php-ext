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
class ExtJsonStore extends ExtStore
{
	/**
	 * @var ExtObjectCollection
	 */
	var $Fields = null;
	
	function ExtJsonStore() {
		ExtJsonStore::ExtStore();

		$this->setExtClassInfo("Ext.data.JsonStore");	
	}	
	
	/**
	 * @param $field ExtFieldConfigObject
	 */
	function &addField(&$field) {
		$this->Columns->addObject(&$field, $field->Name);
		return $field;
	}
	
	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);

		if ($this->Fields->getCount() > 0)
			$params[] = $this->paramToString("fields",$this->Fields);					
			
		return $params;
	}
 	
	
}

?>