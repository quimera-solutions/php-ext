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
 * @subpackage toolbar
 */
class ExtToolbarItem extends ExtObject   
{		
		
	function ExtToolbarItem() {
		ExtToolbarItem::ExtObject();
		$this->setExtClassInfo("Ext.Toolbar.Spacer");	
		
	}	
 		
}

?>