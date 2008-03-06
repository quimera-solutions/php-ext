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
include_once realpath(dirname(__FILE__)."/ext-menuitem.inc.php");

/**
 * @package php-ext
 * @subpackage menu
 */
class ExtMenuCheckItem extends ExtMenuItem   
{			
	var $Checked = false;
	var $Group = null;
	var $GroupCssClass = null;	
		
	function ExtMenuCheckItem($text, $handler = null) {
		ExtMenuCheckItem::ExtMenuItem();
		$this->setExtClassInfo("Ext.menu.CheckItem","");

		$this->Text = $text;
		$this->Handler = $handler;
	}

	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);			
			
		if ($this->Checked) 
			$params[] = $this->paramToString("checked", $this->Checked);
		if ($this->Group != null) 
			$params[] = $this->paramToString("group", $this->Group);
		if ($this->GroupCssClass != null) 
			$params[] = $this->paramToString("groupClass", $this->GroupCssClass);
			
		return $params;
	}
 		
}

?>