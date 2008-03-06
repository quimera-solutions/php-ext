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
class ExtJsonReader extends ExtDataReader 
{
	var $Id = null;
	var $Root = null;
	var $SuccessProperty = null;
	var $TotalProperty = null;
	
	function ExtJsonReader() {
		ExtJsonReader::ExtDataReader();

		$this->setExtClassInfo("Ext.data.JsonReader");	
	}	
	
	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);

		if ($this->Id != null)
			$params[] = $this->paramToString("id",$this->Id);
		if ($this->Root != null)
			$params[] = $this->paramToString("root",$this->Root);
		if ($this->SuccessProperty != null)
			$params[] = $this->paramToString("successProperty",$this->SuccessProperty);
		if ($this->TotalProperty != null)
			$params[] = $this->paramToString("totalProperty",$this->TotalProperty);
			
		return $params;
	}
 	
	
}

?>