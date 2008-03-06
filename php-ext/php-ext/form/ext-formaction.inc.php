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
include_once realpath(dirname(__FILE__)."/../ext-object.inc.php");

define("EXT_FORMACTION_FAILURE_TYPE_CLIENT_INVALID", "Action.CLIENT_INVALID");
define("EXT_FORMACTION_FAILURE_TYPE_CONNECT_FAILURE", "Action.CONNECT_FAILURE");
define("EXT_FORMACTION_FAILURE_TYPE_LOAD_FAILURE", "Action.LOAD_FAILURE");
define("EXT_FORMACTION_FAILURE_TYPE_SERVER_INVALID", "Action.SERVER_INVALID");

/**
 * @package php-ext
 * @subpackage form
 */
class ExtFormAction extends ExtObject 
{	
	var $FailureCallback = null;
	var $Method = null;
	var $Params = null;
	var $Scope = null;
	var $SuccessCallback = null;
	var $Url = null;
	var $WaitMessage = null;
	var $WaitTitle = null;
	var $FailureType = null;
	
	function ExtFormAction() {
		ExtFormAction::ExtObject();
		$this->setExtClassInfo("Ext.form.Action");
	}	 	
	
	function getConfigParams($lazy) {
		$params = parent::getConfigParams($lazy);
		
		if ($this->FailureCallback != null)
			$params[] = "failure: " . $this->FailureCallback;
		if ($this->Method != NULL)
			$params[] = $this->paramToString("method",$this->Method);
		if ($this->Params != null)
			$params[] = "params: " . $this->Params->Render();
		if ($this->Scope != null)
			$params[] = "scope: " . $this->Scope;
		if ($this->SuccessCallback != null)
			$params[] = "success: " . $this->SuccessCallback;
		if ($this->Url != NULL)
			$params[] = $this->paramToString("url",$this->Url);
		if ($this->WaitMessage != NULL)
			$params[] = $this->paramToString("waitMsg",$this->WaitMessage);
		if ($this->WaitTitle != NULL)
			$params[] = $this->paramToString("waitTitle",$this->WaitTitle);
			
		return $params;
	}
	
}

?>