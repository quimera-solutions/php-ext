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
include_once realpath(dirname(__FILE__)."/../ext-object.inc.php");

/**
 * @package php-ext
 * @subpackage data
 */
class ExtRecord extends ExtObject
{
	var $Fields = null;
	
	function ExtRecord() {
		ExtRecord::ExtStore();

		$this->setExtClassInfo("Ext.data.Record");	
	}	
	
	function getConfigParams($lazy) {
		$params = parent::getConfigParams();

		if ($this->Fields != null)
			$params[] = $this->paramToString("fields",$this->Fields);
			
		return $params;
	}
 	
	
}

?>