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
include_once(realpath(dirname(__FILE__)."/javascript.inc.php"));

/**
 * @package php-ext
 */
class ExtHandler extends JavascriptStm {
	var $Statements = array();
	function ExtHandler() {
		$this->Statements = func_get_args();		
	}
	
	function output() {
		$stack = array();
		foreach($this->Statements as $line)
			$stack[] = Javascript::valueToJavascript($line);
		
		$js  = "function(){\n";		
		$js .= implode("\n", $stack);		
		$js .= "}";
		return $js;
	}
}

?>