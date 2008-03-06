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
 * @subpackage panel
 */
class ExtAutoLoadConfigObject extends ExtConfigObject
{
	var $Url;
	var $Method;
	var $Params = array();
	var $Scripts = false;
	var $Callback = null;
	var $Scope = null;
	var $DiscardUrl = true;
	var $Timeout = null;
	var $NoCache = true;
	var $Text = null;
	
	
	function ExtAutoLoadConfigObject($url, $params = array()) {
		ExtAutoLoadConfigObject::ExtConfigObject();

		$this->Url = $url;
		$this->Params = $params;
	}	
	
	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);

		if ($this->Url != null)
			$params[] = $this->paramToString("url",$this->Url);
		if ($this->Method != null)
			$params[] = $this->paramToString("method",$this->Method);
		if ($this->Params != null && count($this->Params) > 0)
			$params[] = $this->paramToString("params",$this->Params);
		if ($this->Scripts)
			$params[] = $this->paramToString("scripts", $this->Scripts);
		if ($this->Callback != null)
			$params[] = $this->paramToString("callback",$this->Callback);
		if ($this->Scope != null)
			$params[] = $this->paramToString("scope",$this->Params);
		if (!$this->DiscardUrl)
			$params[] = $this->paramToString("discardUrl", $this->DiscardUrl);
		if ($this->Timeout != null)
			$params[] = $this->paramToString("timeout", $this->Timeout);
		if (!$this->NoCache)
			$params[] = $this->paramToString("noCache", $this->NoCache);
		if ($this->Text != null)
			$params[] = $this->paramToString("text", $this->Text);	
		
		return $params;
	}
 	
	
}

?>