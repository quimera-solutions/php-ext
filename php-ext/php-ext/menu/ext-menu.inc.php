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
include_once realpath(dirname(__FILE__)."/../ext-observable.inc.php");


/**
 * @package php-ext
 * @subpackage menu
 */
class ExtMenu extends ExtObservable 
{
	var $AllowOtherMenus = false;
	var $DefaultAlign = null; //"tl-bl";
	var $Defaults = null;		
	var $Items = array();
	var $MinWidth = null;
	var $Shadow = null;
	var $SubMenuAlign = null;
	
		
	function ExtMenu() {
		ExtMenu::ExtObservable();
		$this->setExtClassInfo("Ext.menu.Menu");
	
	}
	
	function &addSeparator($key) {
		$this->Items[$key] =& new ExtMenuSeparator();
		return $this->Items[$key];
	}

	function &addCheckItem($key, $text, $handler = null) {
		$this->Items[$key] =& new ExtMenuCheckItem($text, $handler);
		return $this->Items[$key];
	}	
	
	function &addTextItem($key, $text, $handler = null) {
		$this->Items[$key] =& new ExtMenuTextItem($text, $handler);
		return $this->Items[$key];
	}
	
	function &addItem($key, &$item) {
		$this->Items[$key] =& $item;
		return $item;
	}
	
	function removeItem($key) {
		unset($this->Items[$key]);
	}
	
	function &getItem($key) {
		return $this->Items[$key];
	}

	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);

		if ($this->AllowOtherMenus) 
			$params[] = $this->paramToString("allowOtherMenus", $this->AllowOtherMenus);					
		if ($this->DefaultAlign != null) 
			$params[] = $this->paramToString("defaultAlign", $this->DefaultAlign);
		if ($this->Defaults != null) 
			$params[] = "defaults: " . $this->Defaults;
		if ($this->MinWidth != null) 
			$params[] = $this->paramToString("minWidth", $this->MinWidth);
		if ($this->Shadow != null) 
			$params[] = $this->paramToString("shadow", $this->Shadow);
		if ($this->SubMenuAlign != null) 
			$params[] = $this->paramToString("subMenuAlign", $this->SubMenuAlign);			
		
		// Items
		if (count($this->Items) > 0) {
			$renderedItems = array();
			foreach($this->Items as $item) {
				$renderedItems[] = $item->render();
			}
			if ($renderedItems == 1)
				$params[] = "items: ".$renderedItems[0];
			else
				$params[] = "items: [".implode(",",$renderedItems)."]";			
		}		
							
		return $params;
	}
 		
}

?>