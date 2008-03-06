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

/**
 * @package php-ext
 */
class ExtDataView extends ExtBoxComponent 
{
	var $EmptyText = null;
	var $ItemCssSelector = null;
	var $LoadingText = null;
	var $MultiSelect = false;
	var $OverCssClass = null;
	var $SelectedCssClass = null;
	var $SimpleSelect = false;
	var $SingleSelect = false;
	/**
	 * Store
	 *
	 * @var ExtStore
	 */
	var $Store = null;
	var $Template = null;
	
	
	function ExtDataView($itemSelector) {
		ExtDataView::ExtBoxComponent();
		$this->setExtClassInfo("Ext.DataView","dataview");

		$this->ItemCssSelector = $itemSelector;
	}
	
	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);

		if ($this->EmptyText != null)
			$params[] = $this->paramToString("emptyText",$this->EmptyText);
		if ($this->ItemCssSelector != null)
			$params[] = $this->paramToString("itemSelector",$this->ItemCssSelector);
		if ($this->LoadingText != null)
			$params[] = $this->paramToString("loadingText",$this->LoadingText);
		if ($this->MultiSelect)
			$params[] = $this->paramToString("multiSelect",$this->MultiSelect);
		if ($this->OverCssClass != null)
			$params[] = $this->paramToString("overClass",$this->OverCssClass);
		if ($this->SelectedCssClass != null)
			$params[] = $this->paramToString("selectedClass",$this->SelectedCssClass);
		if ($this->SimpleSelect)
			$params[] = $this->paramToString("simpleSelect",$this->SimpleSelect);
		if ($this->SingleSelect)
			$params[] = $this->paramToString("singleSelect",$this->SingleSelect);
		if ($this->Store != null)
			$params[] = $this->paramToString("store",$this->Store);
		if ($this->Template != null)
			$params[] = $this->paramToString("tpl",$this->Template);
			
			
		return $params;
	}
}

?>