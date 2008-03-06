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
include_once realpath(dirname(__FILE__)."/../ext-container.inc.php");
include_once realpath(dirname(__FILE__)."/../ext-objectcollection.inc.php");

define("EXT_PANEL_HALIGN_LEFT","left");
define("EXT_PANEL_HALIGN_CENTER","center");
define("EXT_PANEL_HALIGN_RIGHT","right");

/**
 * @package php-ext
 * @subpackage panel
 */
class ExtPanel extends ExtContainer 
{
	var $AnimCollapse = true;
	
	/**
	 * @var ExtAutoLoadConfigObject
	 */
	var $AutoLoad = null;
	var $AutoScroll = false;
	var $BaseCssClass = null;
	/**
	 * This could also be a ExtToolbar object
	 * 
	 * @var ExtObjectCollection
	 */
	var $BottomToolbar = null;
	var $BodyBorder = true;
	var $BodyStyle = null;
	var $Border = true;
	var $ButtonAlign = EXT_PANEL_HALIGN_RIGHT;
	/**
	 * A collection of ExtButton Objects
	 * 
	 * @var ExtObjectCollection
	 */
	var $Buttons = null;
	var $CollapseFirst = true;
	var $Collapsed = false;
	var $Collapsible = false;
	var $ContentEl = null;
	var $Footer = false;
	var $Frame = false;
	var $Header = null;
	var $HeaderAsText = true;
	var $HideCollapseTool = false;
	var $Html = null;
	/**
	 * 
	 * @var ExtObjectCollection
	 */
	var $TopToolbar = null;
	var $Title = null;
	var $TitleCollapse = false;
	var $LoadMask = false;
	/* TODO: Revisar como se puede implementar el uso de tools
	var $Tools = null;*/

	// ColumnLayout Config Options
	var $ColumnWidth = null;
	
	// TableLayout Config Options
	var $RowSpan = null;
	var $ColSpan = null;
	
	
	
	function ExtPanel() {
		ExtPanel::ExtContainer();
		$this->setExtClassInfo("Ext.Panel","panel");

		$this->BottomToolbar = new ExtObjectCollection();
		$this->Buttons = new ExtObjectCollection();
		$this->TopToolbar = new ExtObjectCollection();
	}

	/**
	 * Adds a button to the footer
	 *
	 * @param ExtButton $field
	 * @return ExtButton
	 */
	function &addButton(&$button) {
		$this->Buttons->addObject(&$button);
		return $button;
	}
	
	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);

		if (!$this->AnimCollapse)
			$params[] = $this->paramToString("animCollapse",$this->AnimCollapse);
		if ($this->AutoLoad != null)
			$params[] = $this->paramToString("autoLoad",$this->AutoLoad);
		if ($this->AutoScroll)
			$params[] = $this->paramToString("autoScroll",$this->AutoScroll);
		if ($this->BaseCssClass != null)
			$params[] = $this->paramToString("baseCls",$this->BaseCssClass);
		if ($this->BottomToolbar != null) {														
			if (ExtObjectCollection::isExtObjectCollection($this->BottomToolbar)) {
				if ($this->BottomToolbar->getCount() > 0)					
					$params[] = $this->paramToString("bbar",$this->BottomToolbar);
				}
			else
				$params[] = $this->paramToString("bbar",$this->BottomToolbar);
		}
		if (!$this->BodyBorder)
			$params[] = $this->paramToString("bodyBorder",$this->BodyBorder);
		if ($this->BodyStyle != null)
			$params[] = $this->paramToString("bodyStyle",$this->BodyStyle);
		if (!$this->Border)
			$params[] = $this->paramToString("border",$this->Border);
		if ($this->ButtonAlign != EXT_PANEL_HALIGN_RIGHT)
			$params[] = $this->paramToString("buttonAlign",$this->ButtonAlign);
		if (!$this->CollapseFirst)
			$params[] = $this->paramToString("collapseFirst",$this->CollapseFirst);
		if ($this->Collapsed)
			$params[] = $this->paramToString("collapsed",$this->Collapsed);
		if ($this->Collapsible)
			$params[] = $this->paramToString("collapsible",$this->Collapsible);
		if ($this->ContentEl != null)
			$params[] = $this->paramToString("contentEl",$this->ContentEl);
		if ($this->Footer)
			$params[] = $this->paramToString("footer",$this->Footer);
		if ($this->Frame)
			$params[] = $this->paramToString("frame",$this->Frame);
		if ($this->Header != null)
			$params[] = $this->paramToString("header",$this->Header);
		if (!$this->HeaderAsText)
			$params[] = $this->paramToString("headerAsText",$this->HeaderAsText);
		if ($this->HideCollapseTool)
			$params[] = $this->paramToString("animCollapse",$this->HideCollapseTool);	
		if ($this->Html != null)
			$params[] = $this->paramToString("html",$this->Html);
		if ($this->TopToolbar != null) {
			if (ExtObjectCollection::isExtObjectCollection($this->TopToolbar)) {
				if ($this->TopToolbar->getCount() > 0)
					$params[] = $this->paramToString("tbar",$this->TopToolbar);
				}
			else
				$params[] = $this->paramToString("tbar",$this->TopToolbar);
		}
		if ($this->Title != null)
			$params[] = $this->paramToString("title",$this->Title);
		if ($this->TitleCollapse)
			$params[] = $this->paramToString("titleCollapse",$this->TitleCollapse);
		if ($this->LoadMask)
			$params[] = $this->paramToString("loadMask",$this->LoadMask);
		// Buttons
		if ($this->Buttons->getCount() > 0) 
			$params[] = $this->paramToString("buttons",$this->Buttons);		
		
		// ColumnLayout
		if ($this->ColumnWidth != null)
			$params[] = $this->paramToString("columnWidth",$this->ColumnWidth);
			
		// TableLayout	
		if ($this->RowSpan != null)
			$params[] = $this->paramToString("rowspan",$this->RowSpan);
		if ($this->ColSpan != null)
			$params[] = $this->paramToString("colspan",$this->ColSpan);
			
			
		return $params;
	}
}

?>