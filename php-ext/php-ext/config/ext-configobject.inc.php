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
include_once realpath(dirname(__FILE__)."/../ext-object.inc.php");


/**
 * @package php-ext
 * @subpackage config
 */
class ExtConfigObject extends ExtObject
{	
	var $Options = array();
	
	function ExtConfigObject($options = array()) {
		ExtConfigObject::ExtObject();

		$this->setExtClassInfo("");
		
		$this->Options = $options;
	}	
	
	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);
		
		foreach($this->Options as $option=>$value) {
			if ($value !== null)
				$params[] = $this->paramToString($option, $value);
		}
		
		return $params;
	}
	
	function getJavascript($lazy = false, $varname = null) {
		return parent::getJavascript(true, null);
	}	 		
}

?>