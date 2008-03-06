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
include_once realpath(dirname(__FILE__)."/ext-textfield.inc.php");

/**
 * @package php-ext
 * @subpackage form
 */
class ExtTriggerField extends ExtTextField 
{
	var $AutoCreate = null;
	var $HideTrigger = false;
	var $TriggerCssClass = null; 
	
	function ExtTriggerField($id, $name, $label = null) {
		ExtTriggerField::ExtTextField($id, $name, $label);
		$this->setExtClassInfo("Ext.form.TriggerField","triggerfield");
		
	}		 
	
	function getConfigParams($lazy = false, $varName = null) {
		$params = parent::getConfigParams($lazy, $varName);
		
		if ($this->AutoCreate != null)
			$params[] = $this->paramToString("autoCreate",$this->AutoCreate);
		if ($this->HideTrigger)
			$params[] = $this->paramToString("hideTrigger",$this->HideTrigger);
		if ($this->TriggerCssClass != null)		
			$params[] = $this->paramToString("triggerClass",$this->TriggerCssClass);		
			
		return $params;
	}
	
}

?>