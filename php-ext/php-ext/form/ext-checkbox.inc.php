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
class ExtCheckbox extends ExtField 
{	
	var $BoxLabel = null;
	var $Checked = false;
	var $Group = null;	
	
	function ExtCheckbox($id, $name, $label = null) {
		ExtCheckbox::ExtField($id, $name, $label);
		$this->setExtClassInfo("Ext.form.Checkbox","checkbox");
	}	 
	
	function getConfigParams($lazy) {
		$params = parent::getConfigParams($lazy);
		
		if ($this->BoxLabel != null)
			$params[] = $this->paramToString("boxLabel", $this->BoxLabel);
		if ($this->Checked)
			$params[] = $this->paramToString("checked",$this->Checked);
		
		return $params;
	}
	
}

?>