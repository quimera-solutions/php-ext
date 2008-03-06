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
include_once realpath(dirname(__FILE__)."/ext-checkbox.inc.php");

/**
 * @package php-ext
 * @subpackage form
 */
class ExtRadio extends ExtCheckbox 
{	
	// var $Group;
	
	function ExtRadio($id, $name, $label = null) {
		ExtRadio::ExtCheckbox($id, $name, $label);
		$this->setExtClassInfo("Ext.form.Radio","radio");
	}	 
	

	
}

?>