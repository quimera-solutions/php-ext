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

/**
 * @package php-ext
 * @subpackage data
 */
class ExtGroupingStore extends ExtStore
{
	var $GroupField = null;
	var $GroupOnSort = false;
	var $RemoteGroup = false;
	
	function ExtGroupingStore() {
		ExtGroupingStore::ExtStore();

		$this->setExtClassInfo("Ext.data.GroupingStore");	
	}	
	
	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy = false);

		if ($this->GroupField != null)
			$params[] = $this->paramToString("groupField",$this->GroupField);
		if ($this->GroupOnSort)
			$params[] = $this->paramToString("groupOnSort",$this->GroupOnSort);			
		if ($this->RemoteGroup)
			$params[] = $this->paramToString("remoteGroup",$this->RemoteGroup); 				
			
		return $params;
	}
 	
	
}

?>