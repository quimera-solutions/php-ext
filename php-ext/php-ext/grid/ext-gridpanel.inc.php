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
include_once realpath(dirname(__FILE__)."/../data/ns.inc.php");
include_once realpath(dirname(__FILE__)."/../panels/ext-panel.inc.php");


/**
 * @package php-ext
 * @subpackage grid
 */
class ExtGridPanel extends ExtPanel 
{
	var $AutoExpandColumn = null;
	var $AutoExpandMax = null;
	var $AutoExpandMin = null;	
	/**
	 * ExtColumnModel
	 *
	 * @var ExtColumnModel
	 */
	var $ColumnModel = null;
	var $DisableSelection = false;
	var $EnableColumnHide = null;
	var $EnableColumnMove = null;	
	var $EnableColumnResize = null;
	var $EnableDragDrop = null;
	var $EnableHeaderMenu = null;
	var $LoadMask = null;
	var $MaxHeight = null;
	var $MinColumnWidth = null;
	var $MonitorWindowResize = true;
	/**
	 * Ext Selection Model Object
	 *
	 * @var ExtAbstractSelectionModel
	 */
	var $SelectionModel = null;
	/**
	 * Ext Store Object
	 *
	 * @var ExtStore
	 */
	var $Store;
	var $StripeRows = false;
	var $TrackMouseOver = true;	
	/**
	 * Ext GridView Object
	 *
	 * @var ExtGridView
	 */
	var $View;
	var $ViewConfig = null;	
	
	function ExtGridPanel() {
		ExtGridPanel::ExtPanel();
		$this->setExtClassInfo("Ext.grid.GridPanel", "grid");
	
	}	
	
	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);
		
		if ($this->AutoExpandColumn != null)
			$params[] = $this->paramToString("autoExpandColumn",$this->AutoExpandColumn);
		if ($this->AutoExpandMax != null)
			$params[] = $this->paramToString("autoExpandMax",$this->StAutoExpandMaxore);
		if ($this->AutoExpandMin != null)
			$params[] = $this->paramToString("autoExpandMin",$this->AutoExpandMin);
		if ($this->ColumnModel != null)
			$params[] = $this->paramToString("colModel",$this->ColumnModel);					
		if ($this->DisableSelection)
			$params[] = $this->paramToString("disableSelection",$this->DisableSelection);
		if ($this->EnableColumnHide != null)
			$params[] = $this->paramToString("enableColumnHide",$this->EnableColumnHide);
		if ($this->EnableColumnMove != null)
			$params[] = $this->paramToString("enableColumnMove",$this->EnableColumnMove);
		if ($this->EnableColumnResize != null)
			$params[] = $this->paramToString("enableColumnResize",$this->EnableColumnResize);
		if ($this->EnableDragDrop != null)
			$params[] = $this->paramToString("enableDragDrop",$this->EnableDragDrop);
		if ($this->EnableHeaderMenu != null)
			$params[] = $this->paramToString("enableHeaderMenu",$this->EnableHeaderMenu);
		if ($this->LoadMask != null)
			$params[] = $this->paramToString("loadMask",$this->LoadMask);
		if ($this->MaxHeight != null)
			$params[] = $this->paramToString("maxHeight",$this->MaxHeight);
		if ($this->MinColumnWidth != null)
			$params[] = $this->paramToString("minColumnWidth",$this->MinColumnWidth);
		if (!$this->MonitorWindowResize)
			$params[] = $this->paramToString("monitorWindowResize",$this->MonitorWindowResize);
		if ($this->SelectionModel != null)
			$params[] = $this->paramToString("selModel",$this->SelectionModel);							
		if ($this->Store != null)
			$params[] = $this->paramToString("store",$this->Store);
		if ($this->StripeRows)
			$params[] = $this->paramToString("stripeRows",$this->StripeRows);
		if (!$this->TrackMouseOver)
			$params[] = $this->paramToString("trackMouseOver",$this->TrackMouseOver);
		if ($this->View != null)
			$params[] = $this->paramToString("view",$this->View);
		if ($this->ViewConfig != null)
			$params[] = $this->paramToString("viewConfig",$this->ViewConfig);
					
		return $params;
	}
 	
	
}

?>