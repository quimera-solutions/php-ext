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
class ExtMenuItem extends ExtMenuBaseItem   
{			
	var $Href = null;
	var $HrefTarget = null;
	var $Icon = null;
	var $IconCssClass = null;
	var $ItemCssClass = null;
	var $ShowDelay = 200;
	var $Text = null;
		
	function ExtMenuItem($text, $handler = null) {
		ExtMenuItem::ExtMenuBaseItem();
		$this->setExtClassInfo("Ext.menu.Item","");		
		
		$this->CanActivate = true;
		$this->Text = $text;
		$this->Handler = $handler;
	}

	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);
			
		if ($this->Href != null) 
			$params[] = $this->paramToString("href", $this->Href);
		if ($this->HrefTarget) 
			$params[] = $this->paramToString("hrefTarget", $this->HrefTarget);
		if ($this->Icon != null) 
			$params[] = $this->paramToString("icon", $this->Icon);
		if ($this->IconCssClass != null) 
			$params[] = $this->paramToString("iconCls", $this->IconCssClass);		
		if ($this->ItemCssClass != null) 
			$params[] = $this->paramToString("itemCls", $this->ItemCssClass);
		if ($this->ShowDelay != 200) 
			$params[] = $this->paramToString("showDelay", $this->ShowDelay);
		if ($this->Text != null) 
			$params[] = $this->paramToString("text", $this->Text);
		unset($params['canActivate']);
		if (!$this->CanActivate) {
			$params[] = $this->paramToString("canActivate", $this->CanActivate);
		}
			
		return $params;
	}
 		
}

?>