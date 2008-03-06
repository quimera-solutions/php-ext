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
include_once realpath(dirname(__FILE__)."/../ext-button.inc.php");

/**
 * @package php-ext
 * @subpackage toolbar
 */
class ExtToolbarButton extends ExtButton  
{		
	
	function ExtToolbarButton($text, $iconUrl = null, $handler = null) {
		ExtToolbarButton::ExtButton("","",$text);
		$this->setExtClassInfo("Ext.Toolbar.Button", "tbbutton");

		$this->Text = $text;
		$this->Icon = $iconUrl;
		$this->Handler = $handler;
	}

	function getConfigParams($lazy = false) {
		if ($this->Icon != null && $this->CssClass == null)
			$this->CssClass = "x-btn-text-icon";
		
		$params = parent::getConfigParams($lazy);
		
		unset($params['xtype']);
				
			
		return $params;
	}
	
}

?>