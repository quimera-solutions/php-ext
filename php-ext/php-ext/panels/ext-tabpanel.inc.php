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
include_once realpath(dirname(__FILE__)."/ext-panel.inc.php");

define("EXT_TABPANEL_POSITON_TOP","top");
define("EXT_TABPANEL_POSITON_BOTTOM","bottom");

/**
 * @package php-ext
 * @subpackage panel
 */
class ExtTabPanel extends ExtPanel
{
	var $ActiveTab = null;
	var $AnimScroll = true;
	var $AutoTabSelector = null;
	var $AutoTabs = false;
	var $DeferredRender = true;
	var $EnableTabScroll = false;
	var $LayoutOnTabChange = false;
	var $MinTabWidth = null;
	var $Plain = false;
	var $ResizeTabs = false;
	var $ScrollDuration = null;
	var $ScrollIncrement = null;
	var $ScrollRepeatInterval = null;
	var $TabMargin = null;
	var $TabPosition = EXT_TABPANEL_POSITON_TOP;
	var $TabWidth = null;
	var $WheelIncrement = null;
	
	function ExtTabPanel() {
		ExtTabPanel::ExtPanel();
		$this->setExtClassInfo("Ext.TabPanel","tabpanel");
		
		// Defaults Override
		$this->MonitorResize = true;
	}	
	
	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);

		if ($this->ActiveTab !== null)
			$params[] = $this->paramToString("activeTab",$this->ActiveTab);
		if (!$this->AnimScroll)
			$params[] = $this->paramToString("animScroll",$this->AnimScroll);
		if ($this->AutoTabSelector != null)
			$params[] = $this->paramToString("autoTabSelector",$this->AutoTabSelector);		
		if ($this->AutoTabs)
			$params[] = $this->paramToString("autoTabs",$this->AutoTabs);
		if (!$this->DeferredRender)
			$params[] = $this->paramToString("deferredRender",$this->DeferredRender);
		if ($this->EnableTabScroll)
			$params[] = $this->paramToString("enableTabScroll",$this->EnableTabScroll);
		if ($this->LayoutOnTabChange)
			$params[] = $this->paramToString("layoutOnTabChange",$this->LayoutOnTabChange);						
		if ($this->MinTabWidth != null)
			$params[] = $this->paramToString("minTabWidth",$this->MinTabWidth);
		if (!$this->MonitorResize)
			$params[] = $this->paramToString("monitorResize",$this->MonitorResize);
		if ($this->Plain)
			$params[] = $this->paramToString("plain",$this->Plain);
		if ($this->ResizeTabs)
			$params[] = $this->paramToString("resizeTabs",$this->ResizeTabs);
		if ($this->ScrollDuration != null)
			$params[] = $this->paramToString("scrollDuration",$this->ScrollDuration);
		if ($this->ScrollIncrement != null)
			$params[] = $this->paramToString("scrollIncrement",$this->ScrollIncrement);
		if ($this->ScrollRepeatInterval != null)
			$params[] = $this->paramToString("scrollRepeatInterval",$this->ScrollRepeatInterval);
		if ($this->TabMargin != null)
			$params[] = $this->paramToString("tabMargin",$this->TabMargin);
		if ($this->TabPosition != EXT_TABPANEL_POSITON_TOP)
			$params[] = $this->paramToString("tabPosition",$this->TabPosition);
		if ($this->TabWidth != null)
			$params[] = $this->paramToString("tabWidth",$this->TabWidth);	
		if ($this->WheelIncrement != null)
			$params[] = $this->paramToString("wheelIncrement",$this->WheelIncrement);
					
		return $params;
	}
}

?>