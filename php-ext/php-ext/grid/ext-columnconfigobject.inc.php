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
include_once realpath(dirname(__FILE__)."/../config/ext-configobject.inc.php");

/**
 * @package php-ext
 * @subpackage grid
 */
class ExtColumnConfigObject extends ExtConfigObject
{
	var $Align = null;
	var $DataIndex = null;
	var $Fixed = null;
	var $Header = null;
	var $Id = null;
	var $Renderer = null;
	var $Resizable = true;
	var $Sortable = null;
	var $Width = null;
	var $Locked = null;
	
	function ExtColumnConfigObject($header, $dataIndex, $id = null, $renderer = null, $sortable = null, $width = null, $locked = null) {
		ExtColumnConfigObject::ExtConfigObject();
		
		$this->Header = $header;
		$this->DataIndex = $dataIndex;
		$this->Id = $id;
		$this->Renderer = $renderer;
		$this->Sortable = $sortable;
		$this->Width = $width;
		$this->Locked = $locked;
	}	
	
	function getConfigParams($lazy) {		
		$this->Options["align"] = $this->Align;
		$this->Options["dataIndex"] = $this->DataIndex;
		$this->Options["fixed"] = $this->Fixed;
		$this->Options["header"] = $this->Header;
		$this->Options["id"] = $this->Id;
		$this->Options["renderer"] = $this->Renderer;
		$this->Options["resizable"] = $this->Resizable;
		$this->Options["sortable"] = $this->Sortable;
		$this->Options["width"] = $this->Width;
		$this->Options["locked"] = $this->Locked;
						
		return parent::getConfigParams();;
	} 
}

?>