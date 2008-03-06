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
class ExtFieldConfigObject extends ExtConfigObject
{	
	var $Name;
	var $Mapping;
	var $Type;
	var $SortType;
	var $SortDir;
	var $Convert;
	var $DateFormat;
	
	function ExtFieldConfigObject($name, $mapping = null, 
		$type = null, $sortType = null, $sortDir = null, 
		$convert = null, $dateFormat = null) {
		ExtFieldConfigObject::ExtConfigObject();	
		
		$this->Name = $name;
		$this->Mapping = $mapping;
		$this->Type = $type;
		$this->SortType = $sortType;
		$this->SortDir = $sortDir;
		$this->Convert = $convert;
		$this->DateFormat = $dateFormat;			
	}	
	
	function getConfigParams($lazy) {		
		$this->Options["name"] = $this->Name;
		$this->Options["mapping"] = $this->Mapping;
		$this->Options["type"] = $this->Type;
		$this->Options["sortType"] = $this->SortType;
		$this->Options["sortDir"] = $this->SortDir;
		$this->Options["convert"] = $this->Convert;
		$this->Options["dateFormat"] = $this->DateFormat;
						
		return parent::getConfigParams();;
	} 
			
}

?>