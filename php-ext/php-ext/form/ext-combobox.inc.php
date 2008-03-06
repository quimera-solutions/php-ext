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
include_once realpath(dirname(__FILE__)."/ext-triggerfield.inc.php");

define("EXT_COMBOBOX_MODES_LOCAL","local");
define("EXT_COMBOBOX_MODES_REMOTE","remote");

define("EXT_COMBOBOX_TRIGGERACTION_QUERY","query");
define("EXT_COMBOBOX_TRIGGERACTION_ALL","all");

define("EXT_COMBOBOX_SHADOW_SIDES","sides");
define("EXT_COMBOBOX_SHADOW_FRAME","frame");
define("EXT_COMBOBOX_SHADOW_DROP","drop");

/**
 * @package php-ext
 * @subpackage form
 */
class ExtComboBox extends ExtTriggerField 
{		
	var $AllQuery = null;
	var $DisplayField = null;
	var $Editable = true;
	var $ForceSelection = true;
	var $HandleHeight = null;	
	var $HiddenName = null;
	var $LazyInit = true;
	var $LazyRender = false;
	var $ListAlign = null;
	var $ListCssClass = null;
	var $ListWidth = null;
	var $LoadingText = null;
	var $MaxHeight = null;
	var $MinChars = null;
	var $MinListWidth = null;	
	var $Mode = EXT_COMBOBOX_MODES_REMOTE;
	var $PageSize = null;
	var $QueryDelay = null;
	var $QueryParam = null;
	var $Resizable = false;
	var $SelectOnFocus = false;
	var $SelectedCssClass = null;
	var $Shadow = EXT_COMBOBOX_SHADOW_SIDES;
	var $Store = null;
	var $Title = null;
	var $Template = null;
	var $Transform = null;
	var $TriggerAction = EXT_COMBOBOX_TRIGGERACTION_ALL;
	var $TypeAhead = false;
	var $TypeAheadDelay = null;	
	var $ValueField = null;
	var $ValueNotFoundText = null;
	
	// Internal DataView Config Options
	var $ItemCssSelector = null;
	var $MultiSelect = false;
	var $OverCssClass = null;
	var $SimpleSelect = false;
	var $SingleSelect = false;

	
	function ExtComboBox($id, $hiddenName, $label = null) {
		ExtComboBox::ExtTriggerField($id, $hiddenName."_combo", $label);
		$this->setExtClassInfo("Ext.form.ComboBox", "combo");
		
		$this->HiddenName = $hiddenName;		
	}	
	
	function getConfigParams($lazy = false, $varName = null) {
		$params = parent::getConfigParams($lazy, $varName);
		
		if ($this->AllQuery != null)
			$params[] = $this->paramToString("allQuery",$this->AllQuery);
		if ($this->DisplayField != null)
			$params[] = $this->paramToString("displayField",$this->DisplayField);					
		if (!$this->Editable)
			$params[] = $this->paramToString("editable",$this->Editable);
		if (!$this->ForceSelection)			
			$params[] = $this->paramToString("forceSelection",$this->ForceSelection);
		if ($this->HandleHeight != null)
			$params[] = $this->paramToString("handleHeight",$this->HandleHeight);
		if ($this->HiddenName != null)
			$params[] = $this->paramToString("hiddenName",$this->HiddenName);
		if (!$this->LazyInit)
			$params[] = $this->paramToString("lazyInit",$this->LazyInit);
		if ($this->LazyRender)
			$params[] = $this->paramToString("lazyRender",$this->LazyRender);
		if ($this->ListAlign != null)
			$params[] = $this->paramToString("listAlign",$this->ListAlign);
		if ($this->ListCssClass != null)
			$params[] = $this->paramToString("listClass",$this->ListCssClass);
		if ($this->ListWidth != null)
			$params[] = $this->paramToString("listWidth",$this->ListWidth);
		if ($this->LoadingText != null)
			$params[] = $this->paramToString("loadingText",$this->LoadingText);
		if ($this->MaxHeight != null)
			$params[] = $this->paramToString("maxHeight",$this->MaxHeight);
		if ($this->MinChars != null)
			$params[] = $this->paramToString("minChars",$this->MinChars);
		if ($this->MinListWidth != null)
			$params[] = $this->paramToString("minListWidth",$this->MinListWidth);						
		if ($this->Mode != null)		
			$params[] = $this->paramToString("mode",$this->Mode);
		if ($this->PageSize != null)		
			$params[] = $this->paramToString("pageSize",$this->PageSize);
		if ($this->QueryDelay != null)		
			$params[] = $this->paramToString("queryDelay",$this->QueryDelay);
		if ($this->QueryParam != null)		
			$params[] = $this->paramToString("queryParam",$this->QueryParam);
		if ($this->Resizable != null)		
			$params[] = $this->paramToString("resizable",$this->Resizable);
		if ($this->SelectOnFocus != null)		
			$params[] = $this->paramToString("selectOnFocus",$this->SelectOnFocus);
		if ($this->SelectedCssClass != null)		
			$params[] = $this->paramToString("selectedClass",$this->SelectedCssClass);
		if ($this->Shadow != EXT_COMBOBOX_SHADOW_SIDES)		
			$params[] = $this->paramToString("shadow",$this->Shadow);
		if ($this->Store != null)
			$params[] = $this->paramToString("store",$this->Store);
		if ($this->Title != null)		
			$params[] = $this->paramToString("title",$this->Title);
		if ($this->Template != null)
			$params[] = $this->paramToString("tpl",$this->Template);
		if ($this->Transform != null)
			$params[] = $this->paramToString("transform",$this->Transform);
		if ($this->TriggerAction != null)
			$params[] = $this->paramToString("triggerAction",$this->TriggerAction);
		if ($this->TypeAhead)
			$params[] = $this->paramToString("typeAhead",$this->TypeAhead);
		if ($this->TypeAheadDelay)
			$params[] = $this->paramToString("typeAheadDelay",$this->TypeAheadDelay);
		if ($this->ValueField != null)
			$params[] = $this->paramToString("valueField",$this->ValueField);
		if ($this->ValueNotFoundText != null)		
			$params[] = $this->paramToString("valueNotFoundText",$this->ValueNotFoundText);
			
		// Internal DataView Config Options
		if ($this->ItemCssSelector != null)
			$params[] = $this->paramToString("itemSelector",$this->ItemCssSelector);
		if ($this->MultiSelect)
			$params[] = $this->paramToString("multiSelect",$this->MultiSelect);
		if ($this->OverCssClass != null)
			$params[] = $this->paramToString("overClass",$this->OverCssClass);
		if ($this->SimpleSelect)
			$params[] = $this->paramToString("simpleSelect",$this->SimpleSelect);
		if ($this->SingleSelect)
			$params[] = $this->paramToString("singleSelect",$this->SingleSelect);
		return $params;
	}
 	
	
}

?>