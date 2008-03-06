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
include_once realpath(dirname(__FILE__)."/ext-boxcomponent.inc.php");
include_once(realpath(dirname(__FILE__)."/ext-objectcollection.inc.php"));

define("EXT_CONTAINER_LAYOUTS_DEFAULT", null);
define("EXT_CONTAINER_LAYOUTS_ACCORDION", "accordion");
define("EXT_CONTAINER_LAYOUTS_ANCHOR", "anchor");
define("EXT_CONTAINER_LAYOUTS_BORDER", "border");
define("EXT_CONTAINER_LAYOUTS_CARD", "card");
define("EXT_CONTAINER_LAYOUTS_COLUMN", "column");
define("EXT_CONTAINER_LAYOUTS_FIT", "fit");
define("EXT_CONTAINER_LAYOUTS_FORM", "form");
define("EXT_CONTAINER_LAYOUTS_TABLE", "table");

/**
 * @package php-ext
 */
class ExtContainer extends ExtBoxComponent 
{
	var $ActiveItem = null;
	var $AutoDestroy = true;
	var $BufferResize = null;
	var $DefaultType = null;
	var $Defaults = null;	
	var $HideBorders = false;
	/**
	 * ExtObject Collection
	 *
	 * @var ExtObjectCollection
	 */
	var $Items = null;
	var $Layout = EXT_CONTAINER_LAYOUTS_DEFAULT;
	var $LayoutConfig = null;
	var $MonitorResize = null;	
	
	function ExtContainer() {
		ExtContainer::ExtBoxComponent();

		$this->setExtClassInfo("Ext.Container","container");
		
		$this->Items = new ExtObjectCollection();
	}	
	
	
	function &addItem(&$item) {
		$this->Items->addObject(&$item);			
		return $item;
	}
	
	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);

		if ($this->ActiveItem != null)
			$params[] = $this->paramToString("activeItem:",$this->ActiveItem);
		if (!$this->AutoDestroy)
			$params[] = $this->paramToString("autoDestroy:",$this->AutoDestroy);
		if ($this->BufferResize != null)
			$params[] = $this->paramToString("bufferResize",$this->BufferResize);
		if ($this->DefaultType != null)
			$params[] = $this->paramToString("defaultType",$this->DefaultType);
		if ($this->Defaults != null)
			$params[] = $this->paramToString("defaults",$this->Defaults);							
		if ($this->HideBorders)
			$params[] = $this->paramToString("hideBorders",$this->HideBorders);

		// Items	
		if ($this->Items->getCount() > 0) {			
			$params[] = $this->paramToString("items",$this->Items);			
		}		
		
		if ($this->Layout != EXT_CONTAINER_LAYOUTS_DEFAULT)
			$params[] = $this->paramToString("layout",$this->Layout);
		if ($this->LayoutConfig != null)
			$params[] = $this->paramToString("layoutConfig",$this->LayoutConfig);
		if ($this->MonitorResize != null)
			$params[] = $this->paramToString("monitorResize",$this->MonitorResize);					
					
		return $params;
	}
}

?>