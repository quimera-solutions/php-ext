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
 * @subpackage grid
 */
class ExtGridView extends ExtObservable  
{
	var $AutoFill = null;
	var $EmptyText = null;
	var $EnableRowBody = false;
	var $ForceFit = null;	
	
	function ExtGridView() {
		ExtGridView::ExtObservable();
		$this->setExtClassInfo("Ext.grid.GridView");	
	}	
	
	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);
		
		if ($this->AutoFill != null)
			$params[] = $this->paramToString("autoFill",$this->AutoFill);
		if ($this->EmptyText != null)
			$params[] = $this->paramToString("emptyText",$this->EmptyText);
		if ($this->EnableRowBody)
			$params[] = $this->paramToString("enableRowBody",$this->EnableRowBody);
		if ($this->ForceFit != null)
			$params[] = $this->paramToString("forceFit",$this->ForceFit);			
					
		return $params;
	}
 	
	
}

?>