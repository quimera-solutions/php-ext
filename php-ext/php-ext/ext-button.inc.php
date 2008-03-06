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

define("EXT_BUTTON_TYPES_DEFAULT",null);
define("EXT_BUTTON_TYPES_BUTTON","button");
define("EXT_BUTTON_TYPES_SUBMIT","submit");
define("EXT_BUTTON_TYPES_RESET","reset");

/**
 * @package php-ext
 */
class ExtButton extends ExtComponent  
{	
	var $Name;
	var $Text;
	var $Enabled = true;
	var $Value;
	var $Icon = null;	
	var $IconClass = null;
	/**
	 * Menu Object
	 *
	 * @var ExtMenu
	 */
	var $Menu = null;
	var $Type = "button";
	var $Handler = null;
			
	
	
	function ExtButton($id, $name, $text, $handler = null) {
		ExtButton::ExtComponent();
		$this->setExtClassInfo("Ext.Button", "button");
		
		$this->Id = $id;
		$this->Name = $name;
		$this->Text = $text;	
		$this->Handler = $handler;	
		
	}	
	
	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);
		
		if ($this->Name != null) 
			$params[] = $this->paramToString("name",$this->Name);
		if ($this->Text != null)
			$params[] = $this->paramToString("text",$this->Text);
		if (!$this->Enabled)
			$params[] = $this->paramToString("disabled",true);
		if ($this->Value != null)
			$params[] = $this->paramToString("value",$this->Value);
		if ($this->Icon != null)
			$params[] = $this->paramToString("icon",$this->Icon);
		if ($this->IconClass != null)
			$params[] = $this->paramToString("iconCls",$this->IconClass);
		if ($this->Menu != null)
			$params[] = $this->paramToString("menu",$this->Menu);
		if ($this->Type != "button")
			$params[] = $this->paramToString("type",$this->Type);
		if ($this->Handler != null)
			$params[] = $this->paramToString("handler",$this->Handler);
						
		return $params;
	}
 	
	
}

?>