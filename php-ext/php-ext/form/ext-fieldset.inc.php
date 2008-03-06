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
include_once realpath(dirname(__FILE__)."/../panels/ext-panel.inc.php");;

/**
 * @package php-ext
 * @subpackage form
 */
class ExtFieldSet extends ExtPanel 
{	
	var $CheckboxName = null;
	var $CheckboxToogle = false;
	var $ItemCssClass = null;
	var $LabelWidth = null;
	
	var $Fields = array();
	var $FieldsLazyRender = true;
	
	function ExtFieldSet() {
		ExtFieldSet::ExtPanel();
		$this->setExtClassInfo("Ext.form.FieldSet","fieldset");
	}

		
	function getConfigParams($lazy) {				
		$params = parent::getConfigParams($lazy);
		
		if ($this->CheckboxName != null)
			$params[] = $this->paramToString("checkboxName", $this->CheckboxName);
		if ($this->CheckboxToggle)
			$params[] = $this->paramToString("checkboxToggle", $this->CheckboxToggle);						
		if ($this->ItemCssClass != null)
			$params[] = $this->paramToString("itemCls",$this->LabelAlign);
		if ($this->LabelWidth != null)
			$params[] = $this->paramToString("labelWidth",$this->LabelWidth);		 						
							
		return $params;
	}
}

?>