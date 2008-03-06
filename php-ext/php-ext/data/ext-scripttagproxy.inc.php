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
include_once realpath(dirname(__FILE__)."/ext-dataproxy.inc.php");

/**
 * @package php-ext
 * @subpackage data
 */
class ExtScriptTagProxy extends ExtDataProxy  
{	
	var $CallbackParam = null;
	var $NoCache = true;
	var $Timeout = null;
	var $Url = null;
	
	function ExtScriptTagProxy($url) {
		ExtScriptTagProxy::ExtDataProxy();

		$this->setExtClassInfo("Ext.data.ScriptTagProxy");

		$this->Url = $url;
	}	
	
	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);

		if ($this->CallbackParam != null)
			$params[] = $this->paramToString("callbackParam", $this->CallbackParam);
		if (!$this->NoCache)
			$params[] = $this->paramToString("noCache", $this->NoCache);
		if ($this->Timeout != null)
			$params[] = $this->paramToString("timeout", $this->Timeout);
		if ($this->Url != null)
			$params[] = $this->paramToString("url", $this->Url);		
		
		return $params;
	}
 	
	
}

?>