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
class ExtTextArea extends ExtTextField  
{	
	
	function ExtTextArea($id, $name, $label = null) {
		ExtTextArea::ExtTextField($id, $name, $label);
		$this->paramToString("Ext.form.TextArea", "textarea");
		
	}		 
	
}

?>