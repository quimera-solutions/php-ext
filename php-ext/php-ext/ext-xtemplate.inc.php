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
include_once realpath(dirname(__FILE__)."/ext-template.inc.php");
/**
 * @package php-ext
 */
class ExtXTemplate extends ExtTemplate {
	
	var $DisableFormats = false;
	var $RegExp = null;

	var $Html = array();
	
	function ExtXTemplate() {
		$args = func_get_args();
		ExtXTemplate::ExtTemplate($args);
		$this->setExtClassInfo("Ext.XTemplate");	
	}
	
		
}

?>