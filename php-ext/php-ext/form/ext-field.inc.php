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
include_once realpath(dirname(__FILE__)."/ext-formpanel.inc.php");

/**
 * @package php-ext
 * @subpackage form
 */
class ExtField extends ExtBoxComponent 
{
	var $Name;
	var $FieldLabel;
	var $Enabled = true;
	var $ReadOnly = false;
	var $Value;	
	var $HideLabel = false;
	var $Required = false;
	var $MsgTarget = EXT_FORM_MSGTARGETS_QTIP;
	
	
	function ExtField($id, $name, $label = null) {
		ExtField::ExtBoxComponent();
		$this->setExtClassInfo("Ext.form.Field","field");

		$this->Id = $id;
		$this->Name = $name;
		$this->FieldLabel = $label;
		if ($this->FieldLabel == null)
			$this->HideLabel = true;
		
	}	
	
	function getConfigParams($lazy) {
		$params = parent::getConfigParams();

		if ($lazy) {
			$params[] = $this->paramToString("xtype",$this->XType);
		}
		if ($this->Name != null) 
			$params[] = $this->paramToString("name",$this->Name);
		if ($this->FieldLabel != null)
			$params[] = $this->paramToString("fieldLabel",$this->FieldLabel);
		if ($this->HideLabel != null)
			$params[] = $this->paramToString("hideLabel",$this->HideLabel);			
		if (!$this->Enabled)
			$params[] = $this->paramToString("disabled",true);
		if ($this->ReadOnly)
			$params[] = $this->paramToString("readOnly",true);
		if ($this->Value != null)
			$params[] = $this->paramToString("value",$this->Value);
		if ($this->Required)
			$params[] = $this->paramToString("allowBlank", false);
		if ($this->MsgTarget != EXT_FORM_MSGTARGETS_QTIP)
			$params[] = $this->paramToString("msgTarget",$this->MsgTarget);
						
					
		return $params;
	}
 	
	
}

?>