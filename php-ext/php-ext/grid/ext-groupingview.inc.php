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
include_once realpath(dirname(__FILE__)."/ext-gridview.inc.php");


/**
 * @package php-ext
 * @subpackage grid
 */
class ExtGroupingView extends ExtGridView  
{
	var $EmptyGroupText = null;
	var $EnableGrouping = true;
	var $EnableGroupingMenu = true;
	var $EnableNoGroups = true;
	var $GroupByText = null;
	var $GroupTextTemplate = null;
	var $HideGroupedColumn = false;
	var $IgnoreAdd = false;
	var $ShowGroupName = false;
	var $ShowGroupsText = null;
	var $StartCollapsed = false;	
	
	function ExtGroupingView() {
		ExtGroupingView::ExtGridView();
		$this->setExtClassInfo("Ext.grid.GroupingView");	
	}	
	
	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);
		
		if ($this->EmptyGroupText != null)
			$params[] = $this->paramToString("emptyGroupText",$this->EmptyGroupText);
		if (!$this->EnableGrouping)
			$params[] = $this->paramToString("enableGrouping",$this->EnableGrouping);
		if (!$this->EnableGroupingMenu)
			$params[] = $this->paramToString("enableGroupingMenu",$this->EnableGroupingMenu);
		if (!$this->EnableNoGroups)
			$params[] = $this->paramToString("enableNoGroups",$this->EnableNoGroups);			
		if ($this->GroupByText != null)
			$params[] = $this->paramToString("groupByText",$this->GroupByText);
		if ($this->GroupTextTemplate != null)
			$params[] = $this->paramToString("groupTextTpl",$this->GroupTextTemplate);
		if ($this->HideGroupedColumn)
			$params[] = $this->paramToString("hideGroupedColumn",$this->HideGroupedColumn);
		if ($this->IgnoreAdd)
			$params[] = $this->paramToString("ignoreAdd",$this->IgnoreAdd);
		if ($this->ShowGroupName)
			$params[] = $this->paramToString("showGroupName",$this->ShowGroupName);
		if ($this->ShowGroupsText != null)
			$params[] = $this->paramToString("showGroupsText",$this->ShowGroupsText);
		if ($this->StartCollapsed)
			$params[] = $this->paramToString("startCollapsed",$this->StartCollapsed);
			
		return $params;
	}
 	
	
}

?>