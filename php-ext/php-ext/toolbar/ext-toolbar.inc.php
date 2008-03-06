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
include_once realpath(dirname(__FILE__)."/../ext-boxcomponent.inc.php");
include_once realpath(dirname(__FILE__)."/../ext-objectcollection.inc.php");


/**
 * @package php-ext
 * @subpackage toolbar
 */
class ExtToolbar extends ExtBoxComponent  
{
	/**
	 * Object Collection
	 *
	 * @var ExtObjectCollection
	 */
	var $Items = null;
		
	function ExtToolbar() {
		ExtToolbar::ExtBoxComponent();
		$this->setExtClassInfo("Ext.Toolbar", "toolbar");
	
		$this->Items = new ExtObjectCollection();
	}
	
	function &addSeparator($key) {
		$this->Items->addObject(new ExtToolbarSeparator(), $key);
		return $this->Items->getObjectByName($key);
	}
	
	function &addSpacer($key) {
		$this->Items->addObject(new ExtToolbarSpacer(), $key);
		return $this->Items->getObjectByName($key);
	}
	
	function &addFill($key) {
		$this->Items->addObject(new ExtToolbarFill(), $key);
		return $this->Items->getObjectByName($key);
	}
	
	function &addText($key, $text) {
		$this->Items->addObject(new ExtToolbarTextItem($text), $key);;
		return $this->Items->getObjectByName($key);
	}
	
	function &addButton($key, $text, $iconUrl = null, $handler = null) {
		$this->Items->addObject(new ExtToolbarButton($text, $iconUrl, $handler), $key);
		return $this->Items->getObjectByName($key);
	}
	
	function &addItem($key, &$item) {
		$this->Items->addObject(&$item, $key);
		return $item;
	}
	
	function removeItem($key) {
		unset($this->Items[$key]);
	}
	
	function &getItem($key) {
		return $this->Items->getObjectByName($key);
	}

	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);
		
		// Items
		if ($this->Items->getCount() > 0) {
			$this->Items->ForceArray = true;
			$params[] = $this->paramToString("items", $this->Items);			
		}		
							
		return $params;
	}
 		
}

?>