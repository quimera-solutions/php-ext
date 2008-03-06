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
include_once realpath(dirname(__FILE__)."/ext-field.inc.php");

/**
 * @package php-ext
 * @subpackage form
 */
class ExtHtmlEditor extends ExtField 
{		
	var $CreateLinkText = null;
	var $DefaultLinkValue = null;
	var $EnableAlignments = true;
	var $EnableColors = true;
	var $EnableFont = true;
	var $EnableFontSize = true;
	var $EnableFormat = true;
	var $EnableLinks = true;
	var $EnableLists = true;
	var $EnableSourceEdit = false;
	var $FontFamilies = null;
	
	function ExtHtmlEditor($id, $name, $label = null) {
		ExtHtmlEditor::ExtField($id, $name, $label);
		$this->setExtClassInfo("Ext.form.HtmlEditor","htmleditor");
	}	 

	function getConfigParams($lazy) {
		$params = parent::getConfigParams($lazy);
			
		if ($this->CreateLinkText != null)
			$params[] = $this->paramToString("createLinkText", $this->CreateLinkText);
		if ($this->DefaultLinkValue != null)
			$params[] = $this->paramToString("defaultLinkValue", $this->DefaultLinkValue);		
		if (!$this->EnableAlignments)		
			$params[] = $this->paramToString("enableAlignments", $this->EnableAlignments);
		if (!$this->EnableColors)		
			$params[] = $this->paramToString("enableColors", $this->EnableColors);
		if (!$this->EnableFont)		
			$params[] = $this->paramToString("enableFont", $this->EnableFont);
		if (!$this->EnableFontSize)		
			$params[] = $this->paramToString("enableFontFamilies", $this->EnableFontSize);
		if (!$this->EnableFormat)		
			$params[] = $this->paramToString("enableFormat", $this->EnableFormat);
		if (!$this->EnableLinks)		
			$params[] = $this->paramToString("enableLinks", $this->EnableLinks);
		if (!$this->EnableLists)		
			$params[] = $this->paramToString("enableLists", $this->EnableLists);
		if ($this->EnableSourceEdit)
			$params[] = $this->paramToString("enableSourceEdit", $this->EnableSourceEdit);			
		if ($this->FontFamilies != null)
			$params[] = $this->paramToString("createLinkText", $this->FontFamilies);
				
		return $params;
	}
	
}

?>