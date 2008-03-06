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
include_once realpath(dirname(__FILE__)."/../ext-component.inc.php");

/**
 * @package php-ext
 * @subpackage menu
 */
class ExtMenuBaseItem extends ExtComponent  
{		
	var $ActiveCssClass = null;
	var $CanActivate = false;
	var $Handler = null;
	var $HideDelay = 100;
	var $HideOnClick = true;
	var $Scope = null;
	var $Items = array();
		
	function ExtMenuBaseItem() {
		ExtMenuBaseItem::ExtComponent();
		$this->setExtClassInfo("Ext.menu.BaseItem","");		
		
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
		
		if (isset($params['xtype']))
			unset($params['xtype']);
			
		if ($this->ActiveCssClass != null) 
			$params[] = $this->paramToString("activeClass", $this->ActiveCssClass);
		if ($this->CanActivate) 
			$params[] = $this->paramToString("canActivate", $this->CanActivate);
		if ($this->Handler != null) 
			$params[] = "handler: " . $this->Handler;
		if ($this->HideDelay != 100) 
			$params[] = $this->paramToString("hideDelay", $this->HideDelay);		
		if (!$this->HideOnClick) 
			$params[] = $this->paramToString("hideOnClick", $this->HideOnClick);
		if ($this->Scope != null) 
			$params[] = $this->paramToString("scope", $this->Scope);

		// Items
		if (count($this->Items) > 0) {
			$renderedItems = array();
			foreach($this->Items as $item) {
				$renderedItems[] = $item->render();
			}
			if ($renderedItems == 1)
				$params[] = "menu: { items: ".$renderedItems[0] . "}";
			else
				$params[] = "menu: { items: [".implode(",\n",$renderedItems)."] }";			
		}			
			
		return $params;
	}
 		
}

?>