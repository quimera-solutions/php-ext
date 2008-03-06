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
include_once realpath(dirname(__FILE__)."/../ext-observable.inc.php");

/**
 * @package php-ext
 * @subpackage data
 */
class ExtDataProxy extends ExtObservable
{		
	function ExtDataProxy() {
		ExtDataProxy::ExtObservable();

		$this->setExtClassInfo("Ext.data.DataProxy");	
	}	
	
	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);		
			
		return $params;
	}
 	
	
}

?>