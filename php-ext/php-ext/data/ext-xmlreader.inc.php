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
class ExtXmlReader extends ExtDataReader 
{
	var $Id = null;
	var $Record = null;
	var $Success = null;
	var $Total = null;
	
	function ExtXmlReader() {
		ExtXmlReader::ExtDataReader();

		$this->setExtClassInfo("Ext.data.XmlReader");	
	}	
	
	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($false);

		if ($this->Id != null)
			$params[] = $this->paramToString("id",$this->Id);
		if ($this->Record != null)
			$params[] = $this->paramToString("record",$this->Record);
		if ($this->Success != null)
			$params[] = $this->paramToString("success",$this->Success);
		if ($this->Total != null)
			$params[] = $this->paramToString("total",$this->Total);
			
		return $params;
	}
 	
	
}

?>