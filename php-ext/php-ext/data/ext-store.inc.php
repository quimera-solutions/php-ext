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

include_once NS_PHP_EXTJS_CONFIG;

/**
 * @package php-ext
 * @subpackage data
 */
class ExtStore extends ExtObservable
{
	/**
	 * If passed, this store's load method is automatically called after creation with the autoLoad object
	 *
	 * @var bool
	 */
	var $AutoLoad = false;
	/**
	 * @var ExtConfigObject
	 */
	var $BaseParams = null;
	/**
	 * Json String
	 * 
	 * @var string
	 */
	var $Data = null;
	/**
	 * @var ExtDataProxy
	 */
	var $Proxy = null;
	/**
	 * @var bool
	 */
	var $PruneModifiedRecords = false;
	/**
	 * @var ExtDataReader
	 */
	var $Reader = null;
	/**
	 * True if sorting is to be handled by requesting the Proxy to provide a refreshed version of the data object in sorted order, as opposed to sorting the Record cache in place (defaults to false). 
	 * If remote sorting is specified, then clicking on a column header causes the current page to be requested from the server with the addition of the following two parameters:
     * - sort : String
     *    The name (as specified in the Record's Field definition) of the field to sort on.
     * - dir : String
     *    The direction of the sort, "ASC" or "DESC".
	 * 
	 * @var bool
	 */
	var $RemoteSort = false;
	/**
	 * SortInfo Configuration Object
	 *
	 * @var ExtSortInfoConfigObject
	 */
	var $SortInfo = null;
	/**
	 * If passed, the id to use to register with the StoreMgr
	 * 
	 * @var string
	 */
	var $StoreId = null;
	/**
	 * If passed, an HttpProxy is created for the passed URL
	 * 
	 * @var string
	 */
	var $Url = null;		
	
	function ExtStore() {
		ExtStore::ExtObservable();

		$this->setExtClassInfo("Ext.data.Store");	
	}	
	
	function load() {
		$args = func_get_args();
		$ms = $this->createMethodSignature("load", $args);
		return $this->getMethodInvokeStm($this->VarName, $ms);
	}
	
	function loadData($data, $append = false) {
		$args = func_get_args();
		$ms = $this->createMethodSignature("loadData", $args);
		return $this->getMethodInvokeStm($this->VarName, $ms);
	}
	
	
	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);

		if ($this->AutoLoad)
			$params[] = $this->paramToString("autoLoad",$this->AutoLoad);
		if ($this->BaseParams != null)
			$params[] = $this->paramToString("baseParams",$this->BaseParams);			
		if ($this->Data != null)
			$params[] = $this->paramToString("data",$this->Data); 				
		if ($this->Proxy != null)
			$params[] = $this->paramToString("proxy",$this->Proxy);
		if ($this->PruneModifiedRecords)
			$params[] = $this->paramToString("pruneModifiedRecords",$this->PruneModifiedRecords);
		if ($this->Reader != null)
			$params[] = $this->paramToString("reader",$this->Reader);
		if ($this->RemoteSort)
			$params[] = $this->paramToString("remoteSort",$this->RemoteSort);
		if ($this->SortInfo != null)
			$params[] = $this->paramToString("sortInfo",$this->SortInfo);			
		if ($this->StoreId != null)
			$params[] = $this->paramToString("storeId", $this->StoreId);
		if ($this->Url != null)
			$params[] = $this->paramToString("url", $this->Url);
			
		return $params;
	}
 	
	
}

?>