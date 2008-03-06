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
class ExtMenuTextItem extends ExtMenuBaseItem   
{			
	var $ItemCssClass = null;	
	var $Text = null;
		
	function ExtMenuTextItem($text, $handler = null) {
		ExtMenuTextItem::ExtMenuBaseItem();
		$this->setExtClassInfo("Ext.menu.TextItem","");		
		
		$this->HideOnClick = false;
		$this->Text = $text;
		$this->Handler = $handler;
	}

	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);
				
		if ($this->ItemCssClass != null) 
			$params[] = $this->paramToString("itemCls", $this->ItemCssClass);
		if ($this->Text != null) 
			$params[] = $this->paramToString("text", $this->Text);
		
		unset($params['hideOnClick']);
		if ($this->HideOnClick) {			
			$params[] = $this->paramToString("hideOnClick", $this->HideOnClick);
		}
			
		return $params;
	}
 		
}

?>