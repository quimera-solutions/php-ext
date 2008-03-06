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
include_once realpath(dirname(__FILE__)."/ext-object.inc.php");

/**
 * @package php-ext
 */
class ExtObservable extends ExtObject {

	var $Listeners = array();
	
	function ExtObservable() {
		ExtObservable::ExtObject();			
	}		
	
	
	function addListener($eventName, &$listener) {
		$this->Listeners[$eventName] =& $listener;
	}
	
	function getConfigParams($lazy = false) {		
		$params = parent::getConfigParams($lazy);

		$resolvedListeners = array();
		foreach($this->Listeners as $event=>$handler)
			$resolvedListeners[] = "'$event': ".$handler->getJavascript();
		if (count($resolvedListeners) > 0)
			$params[] = "listeners: { ".implode(",",$resolvedListeners)." }";				
			
		return $params;
	}
	
	function paramToString($name, $value) {
		$resolvedValue = Javascript::valueToJavascript($value);
		if ($resolvedValue !== null)		
			return "$name: $resolvedValue";
		else
			return "";
	}
		
}

?>