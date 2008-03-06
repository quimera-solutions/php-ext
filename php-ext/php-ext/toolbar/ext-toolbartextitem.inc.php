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
class ExtToolbarTextItem extends ExtToolbarItem    
{		
	var $Text = null;	
	
	function ExtToolbarTextItem($text) {
		ExtToolbarTextItem::ExtToolbarItem();
		$this->setExtClassInfo("Ext.Toolbar.TextItem");

		$this->Text = $text;
	}	
	
	function getJavascript($lazy = false, $varName = null) {					
		$className = $this->ExtClassName;		
		$configObj = "";		
		if ($lazy)
			return "'".$this->Text."'";
		else {
			$js = "new $className('".$this->Text."')";
			if ($varName != null) {
				$this->VarName = $varName;
				$js = "var $varName = $js;";
			}		
			return $js;
		}
	}
 		
}

?>