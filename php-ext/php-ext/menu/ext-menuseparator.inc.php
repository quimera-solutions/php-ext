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
include_once realpath(dirname(__FILE__)."/ext-menubaseitem.inc.php");

/**
 * @package php-ext
 * @subpackage menu
 */
class ExtMenuSeparator extends ExtMenuBaseItem   
{			
	var $ItemCssClass = null;		
		
	function ExtMenuSeparator() {
		ExtMenuSeparator::ExtMenuBaseItem();
		$this->setExtClassInfo("Ext.menu.Separator","");

		$this->HideOnClick = false;
		
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
	
	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);
				
		if (!$this->ItemCssClass) 
			$params[] = $this->paramToString("itemCls", $this->ItemCssClass);
		if ($this->HideOnClick) {
			unset($params['hideOnClick']);
			$params[] = $this->paramToString("hideOnClick", $this->HideOnClick);
		}
			
		return $params;
	}
 		
}

?>