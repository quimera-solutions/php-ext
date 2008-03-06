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
include_once realpath(dirname(__FILE__)."/../ext-objectcollection.inc.php");

/**
 * @package php-ext
 * @subpackage grid
 */
class ExtColumnModel extends ExtObservable  
{	
	/**
	 * @var ExtObjectCollection
	 */
	var $Columns = null;
	
	function ExtColumnModel() {
		ExtColumnModel::ExtObservable();
		$this->setExtClassInfo("Ext.grid.ColumnModel");
	
		$this->Columns = new ExtObjectCollection();
	}	
	
	/**
	 * @param $column ExtColumnConfigObject
	 */
	function &addColumn(&$column) {
		$this->Columns->addObject(&$column, $column->DataIndex);
		return $column;
	}
	
	function getJavascript($lazy = false, $varName = null) {
		$configParams = $this->getConfigParams($lazy);
				
		$className = $this->ExtClassName;		
		$configObj = $configParams[0];
				
		if ($lazy)
			return $configObj;
		else {
			$js = "new $className($configObj)";
			if ($varName != null) {
				$this->VarName = $varName;
				$js = "var $varName = $js;";
			}
				
			return $js;
		}
	}
	
	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);
				
		if (count($this->Columns->getCount()) > 0) {			
			$params[] = $this->Columns->getJavascript();
		}						
		return $params;
	} 	
}



?>