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
include_once realpath(dirname(__FILE__)."/../../php-ext/php-ext.php");
include_once realpath(PHP_EXTJS_DOC_ROOT."/form/ext-triggerfield.inc.php");


/**
 * @package php-ext-ux
 * @subpackage app
 */
class ExtSearchField extends ExtTriggerField  
{	
	/**
	 * Store
	 *
	 * @var ExtStore
	 */
	var $Store;
	
	function ExtSearchField() {
		ExtSearchField::ExtTriggerField(null, null, null);

		$this->setExtClassInfo("Ext.app.SearchField",null);		
	}	
	
	function getConfigParams($lazy = false, $varName = null) {
		$params = parent::getConfigParams(false, $varName);
				
		if ($this->Store != null)
			$params[] = $this->paramToString("store",$this->Store); 		
		
					
		return $params;
	}
	
	function getJavascript($lazy = false, $varName = null) {
		return parent::getJavascript(false, $varName);
	}

}

?>