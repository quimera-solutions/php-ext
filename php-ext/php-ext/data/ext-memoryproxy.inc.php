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
include_once realpath(dirname(__FILE__)."/ext-dataproxy.inc.php");

/**
 * @package php-ext
 * @subpackage data
 */
class ExtMemoryProxy extends ExtDataProxy  
{	
	function ExtMemoryProxy() {
		ExtMemoryProxy::ExtDataProxy();

		$this->setExtClassInfo("Ext.data.MemoryProxy");	
	}	
	
	function getConfigParams($lazy) {
		$params = parent::getConfigParams();

		return $params;
	}
 	
	
}

?>