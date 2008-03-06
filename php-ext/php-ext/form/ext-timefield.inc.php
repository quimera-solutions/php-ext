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
include_once realpath(dirname(__FILE__)."/ext-combobox.inc.php");

/**
 * @package php-ext
 * @subpackage form
 */
class ExtTimeField extends ExtComboBox 
{
	var $AltFormats = null;
	var $Format = null;
	var $Increment = null;
	var $InvalidText = null;
	var $MaxText = null;
	var $MaxValue = null;
	var $MinText = null;
	var $MinValue = null;	
	
	function ExtTimeField($id, $name, $label = null) {
		ExtTimeField::ExtComboBox($id, $name, $label);
		$this->setExtClassInfo("Ext.form.TimeField", "timefield");		
	}	
	
	function getConfigParams($lazy = false, $varName = null) {
		$params = parent::getConfigParams($lazy, $varName);
		
		if ($this->AltFormats != null)
			$params[] = $this->paramToString("altFormats",$this->AltFormats);
		if ($this->Format != null)
			$params[] = $this->paramToString("format",$this->Format); 					
		if ($this->Increment != null)
			$params[] = $this->paramToString("increment",$this->Increment);
		if ($this->InvalidText != null)
			$params[] = $this->paramToString("invalidText",$this->InvalidText);
		if ($this->MaxText != null)
			$params[] = $this->paramToString("maxText",$this->MaxText);
		if ($this->MaxValue != null)
			$params[] = $this->paramToString("maxValue",$this->MaxValue);
		if ($this->MinText != null)
			$params[] = $this->paramToString("minText",$this->MinText);
		if ($this->MinValue != null)
			$params[] = $this->paramToString("minValue",$this->MinValue);
		
					
		return $params;
	}
 	
	
}


?>