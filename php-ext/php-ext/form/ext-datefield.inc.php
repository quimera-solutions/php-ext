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

/**
 * @package php-ext
 * @subpackage form
 */
class ExtDateField extends ExtTriggerField 
{
	var $Format;
	
	function ExtDateField($id, $name, $label = null) {
		ExtDateField::ExtTriggerField($id, $name, $label);
		$this->setExtClassInfo("Ext.form.DateField", "datefield");
		$this->Format = "Y-m-d";	
	}	
	
	function getConfigParams($lazy) {
		$params = parent::getConfigParams($lazy);
		
		$params[] = $this->paramToString("format",$this->Format); 					
					
		return $params;
	}
 	
	
}


?>