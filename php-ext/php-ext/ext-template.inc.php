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
include_once realpath(dirname(__FILE__)."/ext-object.inc.php");

/**
 * @package php-ext
 */
class ExtTemplate extends ExtObject {
	
	var $DisableFormats = false;
	var $RegExp = null;

	var $Html = array();
	
	function ExtTemplate() {
		ExtTemplate::ExtObject();
		$this->setExtClassInfo("Ext.Template");
		
		$args = func_get_args();
		if (count($args) > 0 && is_array($args[0]))
			$this->Html = $args[0];
		else
			$this->Html = $args;		
	}

	function from($element, $config) {
		$args = func_get_args();
		$mc = $this->createMethodSignature("from", $args, true);
		return $this->getMethodInvokeStm($this->VarName, $mc, true);
	}
	
	function append($element, $values, $returnElement = false) {
		$args = func_get_args();
		$mc = $this->createMethodSignature("append", $args);
		return $this->getMethodInvokeStm($this->VarName, $mc, true);
	}
	
	function apply() {
		$args = func_get_args();
		$mc = $this->createMethodSignature("apply");
		return $this->getMethodInvokeStm($this->VarName, $mc, true);
	}
	
	function applyTemplate() {
		$args = func_get_args();
		$mc = $this->createMethodSignature("apply");
		return $this->getMethodInvokeStm($this->VarName, $mc, true);
	}
	
	function complie() {
		$args = func_get_args();
		$mc = $this->createMethodSignature("compile");
		return $this->getMethodInvokeStm($this->VarName, $mc, true);
	}
	
	function insertAfter($element, $values, $returnElement = false) {
		$args = func_get_args();
		$mc = $this->createMethodSignature("insertAfter", $args);
		return $this->getMethodInvokeStm($this->VarName, $mc, true);
	}
	
	function insertBefore($element, $values, $returnElement = false) {
		$args = func_get_args();
		$mc = $this->createMethodSignature("insertBefore", $args);
		return $this->getMethodInvokeStm($this->VarName, $mc, true);
	}
	
	function insertFirst($element, $values, $returnElement = false) {
		$args = func_get_args();
		$mc = $this->createMethodSignature("insertFirst", $args);
		return $this->getMethodInvokeStm($this->VarName, $mc, true);
	}
	
	function overwrite($element, $values, $returnElement = false) {
		$args = func_get_args();
		$mc = $this->createMethodSignature("overwrite", $args);
		return $this->getMethodInvokeStm($this->VarName, $mc, true);
	}
	
	function set($html, $compile = false) {
		$args = func_get_args();
		$mc = $this->addMethodCall("set", $args);
		return $this->getMethodInvokeStm($this->VarName, $mc, true);
	}
	
	function getJavascript($lazy = false, $varName = null) {
		if ($this->VarName == null) {		
			$html = array();
			foreach($this->Html as $line)
				$html[] = "'$line'";
						
			$js  = "new ".$this->ExtClassName."(";
			$js .= implode(",", $html);
			$js .= ")";
			
			if ($varName != null) {
				$this->VarName = $varName;
				$js = "var ".$this->VarName." = $js;";
			}			
			return $js;
		}
		else {
			return $this->VarName;
		}		
	}
		
}

?>