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
include_once(realpath(dirname(__FILE__)."/config/ext-configobject.inc.php"));

/**
 * @package php-ext
 */
class ExtListener extends ExtConfigObject  {
	
	var $Handler = null;
	var $Scope = null;
	var $Delay = null;
	var $Single = null;
	var $Buffer = null;
	
	function ExtListener($handler, $scope = null, $delay = null, $single = null, $buffer = null) {
		ExtListener::ExtConfigObject();
		
		$this->Handler = $handler;
		$this->Scope = $scope;
		$this->Delay = $delay;
		$this->Single = $single;
		$this->Buffer = $buffer;			
	}
	
	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);
			
		if (Javascript::isJavascript($this->Handler) || Javascript::isJavascriptStm($this->Handler))
			$handler = $this->Handler->output();
		else
			$handler = $this->Handler;		
		
		$params[] = "fn:".$handler;
		if ($this->Scope !== null)
			$params[] = $this->paramToString("scope",$this->Scope);
		if ($this->Delay !== null)
			$params[] = $this->paramToString("delay",$this->Delay);
		if ($this->Single !== null)
			$params[] = $this->paramToString("single",$this->Single);
		if ($this->Buffer !== null)
			$params[] = $this->paramToString("buffer",$this->Buffer);		
					
		
		return $params;
	}
	
	
}

?>