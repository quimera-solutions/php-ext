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
include_once realpath(dirname(__FILE__)."/../config/ext-configobject.inc.php");


/**
 * @package php-ext
 * @subpackage data
 */
class ExtSortInfoConfigObject extends ExtConfigObject
{
	var $Field;
	var $DirectionAscendent = true;
		
	function ExtSortInfoConfigObject($field, $directionAscendent = true) {
		ExtSortInfoConfigObject::ExtConfigObject();

		$this->Field = $field;
		$this->DirectionAscendent = $directionAscendent;	
	}
	
	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);

		if ($this->Field)
			$params[] = $this->paramToString("field",$this->Field);
		if ($this->DirectionAscendent)
			$params[] = $this->paramToString("direction","ASC");
		else
			$params[] = $this->paramToString("direction","DESC");
			
		return $params;
	}
 	
	
}

?>