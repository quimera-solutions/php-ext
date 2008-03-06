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
include_once realpath(dirname(__FILE__)."/ext-toolbarspacer.inc.php");

/**
 * @package php-ext
 * @subpackage toolbar
 */
class ExtToolbarFill extends ExtToolbarSpacer  
{		
		
	function ExtToolbarFill() {
		ExtToolbarFill::ExtToolbarSpacer();
		$this->setExtClassInfo("Ext.Toolbar.Fill", "tbfill");	
		
	}	

	function render($lazy = false, $varName = null) {					
		$className = $this->ExtClassName;		
		$configObj = "";
		
		if ($lazy)
			return "'->'";
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