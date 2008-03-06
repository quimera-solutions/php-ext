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
 * @package php-ext
 */
class ExtObject {
	/**
	 * Application Context
	 *
	 * @var Context
	 */
	var $Context;
	
	// Ext-js	
	var $ExtClassName = "";
	
	var $ConfigParams = array();
	var $VarName = null;
		
	var $MethodCallList = array();
	
	function ExtObject() {
		$this->Context =& $GLOBALS['Context'];				
	}
	
	function setExtClassInfo($extClassName) {
		$this->ExtClassName = $extClassName;		
	}
	
	function getJavascript($lazy = false, $varName = null) {
		if ($this->VarName == null) {
			$configParams = $this->getConfigParams($lazy);

			$className = $this->ExtClassName;		
			$configObj = "{".implode(",",$configParams)."}";
			
			if ($lazy)
				return $configObj;
			else {
				$js = "new $className($configObj)";
				if ($varName != null) {
					$this->VarName = $varName;
					$js = "var $varName = $js;";
				}					
				return $js;
			}
		}
		else {
			return $this->VarName;
		}
	}	
	
	function getConfigParams($lazy = false) {		
		$params = array();
		
			
		return $params;
	}
	
	function paramToString($name, $value) {
		$resolvedValue = Javascript::valueToJavascript($value);		

		if (strpos($name,"-") !== false)
			$name = "\"$name\"";		
		
		return "$name: $resolvedValue";
	}		
	
	function createMethodSignature($methodName, $params = null, $static = false) {
		$methodSig = array("methodName"=>$methodName, "params"=>$params, "static"=>$static);				
		return $methodSig;
	}	
	
	/**
	 * @return JavascriptStm
	 */
	function getMethodInvokeStm($instanceVarName, $methodSignature, $inline = false) {
		$params = array();
		foreach($methodSignature['params'] as $key=>$value)
			$params[$key] = Javascript::valueToJavascript($value);
		if ($methodSignature['static'])
			$js = (isset($this) && isset($this->ExtClassName) && $this->ExtClassName != null)?$this->ExtClassName:$instanceVarName;
		else
			$js = $instanceVarName;				
		$js .= ".".$methodSignature['methodName']."(".implode(",",$params).")";
		return ($inline) ? Javascript::inlineStm($js) : Javascript::stm($js);
	} 
	
	function isExtObject($value) {
		if (is_object($value)) {
			return (get_class($value) == "extobject" || is_subclass_of($value, "extobject") ||
				get_class($value) == "ExtObject" || is_subclass_of($value, "ExtObject"));
		}
		return false;
	}
		
		
}

?>