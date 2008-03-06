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
include_once(realpath(dirname(__FILE__)."/ext-object.inc.php"));

/**
 * @package php-ext
 */
class ExtObjectCollection 
{
	/**
	 * Collection Container
	 *
	 * @var array	 
	 */
	var $Collection = array();
	var $ForceArray = false;
	
	function ExtObjectCollection($collection = array()) {
		$this->Collection = $collection;	
	}
	
	function addObject(&$object, $name = null) {
		if ($name !== null)
			$this->Collection[$name] =& $object;
		else
			$this->Collection[] =& $object;
		return count($this->Collection);
	}
	
	function &getObjectByName($name) {
		if (array_key_exists($name, $this->Collection))
			return $this->Collection[$name];
		return null;  
	}
	
	function &getObjectByIndex($index) {
		if ($index < count($this->Collection) )
			return $this->Collection[$index];
		return null;  
	}
	
	function getCount() {
		return count($this->Collection);
	}
	
	function getJavascript() {
		$resolvedObjs = array();
		foreach($this->Collection as $obj) {			
			$resolvedObjs[] = Javascript::valueToJavascript($obj, true);
		}
		if (count($resolvedObjs) == 1 && !$this->ForceArray)
			return $resolvedObjs[0];
		else
			return "[".implode(",",$resolvedObjs)."]";
	}
	
	function isExtObjectCollection($value) {
		if (is_object($value)) {
			return (get_class($value) == "extobjectcollection" || is_subclass_of($value, "extobjectcollection") ||
				get_class($value) == "ExtObjectCollection" || is_subclass_of($value, "ExtObjectCollection"));
		}
		return false;
	}
}


?>