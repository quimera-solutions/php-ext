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
include_once realpath(dirname(__FILE__)."/ext-toolbaritem.inc.php");

/**
 * @package php-ext
 * @subpackage toolbar
 */
class ExtToolbarSeparator extends ExtToolbarItem    
{		
		
	function ExtToolbarSeparator() {
		ExtToolbarSeparator::ExtToolbarItem();
		$this->setExtClassInfo("Ext.Toolbar.Separator");		
	}	
	
	function render($lazy = false, $varName = null) {					
		$className = $this->ExtClassName;		
		$configObj = "";
		
		if ($lazy)
			return "'-'";
		else {
			$js = "new $className($configObj)";
			if ($varName != null) {
				$this->VarName = $varName;
				$js = "var $varName = $js;";
			}		
			return $js;
		}
	}
 		
}

?>