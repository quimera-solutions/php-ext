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
include_once realpath(dirname(__FILE__)."/ext-datareader.inc.php");

/**
 * @package php-ext
 * @subpackage data
 */
class ExtArrayReader extends ExtDataReader 
{
	var $Id = null;
	
	function ExtArrayReader() {
		ExtArrayReader::ExtDataReader();

		$this->setExtClassInfo("Ext.data.ArrayReader");	
	}	
	
	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);

		if ($this->Id !== null)
			$params[] = $this->paramToString("id",$this->Id);
			
		return $params;
	}
 	
	
}

?>