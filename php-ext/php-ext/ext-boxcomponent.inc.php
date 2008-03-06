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
include_once realpath(dirname(__FILE__)."/ext-component.inc.php");

/**
 * @package php-ext
 */
class ExtBoxComponent extends ExtComponent 
{
	var $AutoHeight = false;
	var $AutoWidth = false;
	var $Height = null;
	var $Width = null;
	var $Anchor = null;
	
	function ExtBoxComponent() {
		ExtBoxComponent::ExtComponent();

		$this->setExtClassInfo("Ext.BoxComponent","box");
	}	
	
	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);

		if ($this->AutoHeight)
			$params[] = $this->paramToString("autoHeight",$this->AutoHeight);
		if ($this->AutoWidth)
			$params[] = $this->paramToString("autoWidth",$this->AutoWidth);		
		if ($this->Height != null)
			$params[] = $this->paramToString("height",$this->Height);
		if ($this->Width != null)
			$params[] = $this->paramToString("width", $this->Width);			
		if ($this->Anchor != null)
			$params[] = $this->paramToString("anchor", $this->Anchor);
					
		return $params;
	}
}

?>