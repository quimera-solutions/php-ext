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
include_once realpath(dirname(__FILE__)."/ext-toolbar.inc.php");


/**
 * @package php-ext
 * @subpackage toolbar
 */
class ExtPagingToolbar extends ExtToolbar 
{	
	var $DisplayInfo = false;
	var $DisplayMessage = null;
	var $EmptyMessage = null;
	var $PageSize = 20;
	var $Store = null;
	
	function ExtPagingToolbar() {
		ExtPagingToolbar::ExtToolbar();
		$this->setExtClassInfo("Ext.PagingToolbar", "paging");
	
	}	
	
	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);			

		if ($this->DisplayInfo)
			$params[] = $this->paramToString("displayInfo", $this->DisplayInfo);
		if ($this->DisplayMessage != null)
			$params[] = $this->paramToString("displayMessage", $this->DisplayMessage);
		if ($this->EmptyMessage != null)
			$params[] = $this->paramToString("emptyMessage", $this->EmptyMessage);
		if ($this->PageSize != 20)
			$params[] = $this->paramToString("pageSize", $this->PageSize);
		if ($this->Store != null)
			$params[] = $this->paramToString("store", $this->Store);
				
		return $params;
	}
 	
	
}

?>