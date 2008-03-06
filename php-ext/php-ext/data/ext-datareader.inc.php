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
include_once realpath(dirname(__FILE__)."/../ext-objectcollection.inc.php");


/**
 * @package php-ext
 * @subpackage data
 */
class ExtDataReader extends ExtObject
{	
	/**
	 * @var ExtObjectCollection
	 */
	var $Fields = null;	
	
	function ExtDataReader() {
		ExtDataReader::ExtObject();

		$this->setExtClassInfo("Ext.data.DataReader");

		$this->Fields = new ExtObjectCollection();
	}	
	
	/**
	 * @param ExtFieldConfigObject
	 * 
	 */
	function &addField(&$fieldConfigObj) {
		$this->Fields->addObject(&$fieldConfigObj, $fieldConfigObj->Name);
		return $fieldConfigObj;
	}
	
	function getJavascript($lazy = false, $varName = null) {
		if ($this->VarName == null) {
			$configParams = $this->getConfigParams($lazy);
			$configObj = "{".implode(",",$configParams)."}";
								
			$recordType = $this->Fields->getJavascript(); 			
					
			$className = $this->ExtClassName;
	
			$js = "new $className($configObj, $recordType)";
			if ($varName != null) {
				$this->VarName = $varName;
				$js = "var $varName = $js;";
			}					
			return $js;
		} 
		else
			return $this->VarName;
	}
	
	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy = false);		
			
		return $params;
	}
 	
	
}

?>