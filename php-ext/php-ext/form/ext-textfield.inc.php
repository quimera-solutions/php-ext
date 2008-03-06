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
include_once realpath(dirname(__FILE__)."/ext-field.inc.php");

/**
 * @package php-ext
 * @subpackage form
 */
class ExtTextField extends ExtField 
{	
	var $IsPassword = false;
	
	var $AllowBlank = true;
	var $BlankText = null;
	var $DisableKeyFilter = false;
	var $EmptyClass = null;
	var $EmptyText = null;
	var $Grow = false;
	var $GrowMax = null;
	var $GrowMin = null;
	var $MaskRegExp = null;
	var $MaxLength = null;
	var $MaxLengthText = null;
	var $RegExp = null;
	var $RegExpText = null;
	var $SelectOnFocus = false;
	var $Validator = null;
	var $VType = null;
	var $VTypeText = null;
	
	function ExtTextField($id, $name, $label = null, $vtype = null) {
		ExtTextField::ExtField($id, $name, $label);
		$this->setExtClassInfo("Ext.form.TextField","textfield");
		
		$this->VType = $vtype;
	}	 

	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);
		
		if ($this->IsPassword)
			$params[] = "defaultAutoCreate: {tag: \"input\", type: \"password\", size: \"20\", autocomplete: \"off\"}";

		if (!$this->AllowBlank)
			$params[] = $this->paramToString("allowBlank", $this->AllowBlank);
		if ($this->BlankText != null)
			$params[] = $this->paramToString("blankText", $this->BlankText);
		if ($this->DisableKeyFilter)
			$params[] = $this->paramToString("disableKeyFilter", $this->DisableKeyFilter);
		if ($this->EmptyClass != null)
			$params[] = $this->paramToString("emptyClass", $this->EmptyClass);
		if ($this->EmptyText != null)
			$params[] = $this->paramToString("emptyText", $this->EmptyText);
		if ($this->Grow)
			$params[] = $this->paramToString("grow", $this->Grow);
		if ($this->GrowMax != null)
			$params[] = $this->paramToString("growMax", $this->GrowMax);
		if ($this->GrowMin != null)
			$params[] = $this->paramToString("growMin", $this->GrowMin);
		if ($this->MaskRegExp != null)
			$params[] = $this->paramToString("maskRe", $this->MaskRegExp);
		if ($this->MaxLength != null)
			$params[] = $this->paramToString("maxLength", $this->MaxLength);
		if ($this->MaxLengthText != null)
			$params[] = $this->paramToString("maxLengthText", $this->MaxLengthText);
		if ($this->RegExp != null)
			$params[] = $this->paramToString("regex", $this->RegExp);
		if ($this->RegExpText != null)
			$params[] = $this->paramToString("regexText", $this->RegExpText);
		if ($this->SelectOnFocus)
			$params[] = $this->paramToString("selectOnFocus", $this->SelectOnFocus);
		if ($this->Validator != null)
			$params[] = $this->paramToString("validator", $this->Validator);
		if ($this->VType != null)
			$params[] = $this->paramToString("vtype", $this->VType);
		if ($this->VTypeText != null)
			$params[] = $this->paramToString("vtypeText", $this->VTypeText);
						
		return $params;
	}
	
}

?>