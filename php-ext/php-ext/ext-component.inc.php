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
include_once realpath(dirname(__FILE__)."/ext-observable.inc.php");

/**
 * @package php-ext
 */
class ExtComponent extends ExtObservable
{
	var $XType = "";
	
	var $ApplyTo = null;
	var $CssClass = null;
	var $ContainerCssClass = null;
	var $Id = null;
	var $RenderTo = null;
	var $CssStyle = null;		
	
	function ExtComponent() {
		ExtComponent::ExtObservable();

		$this->setExtClassInfo("Ext.Component","component");	
	}	
	
	function setExtClassInfo($extClassName, $xtype) {
		$this->ExtClassName = $extClassName;
		$this->XType = $xtype;
	}
	
	function render() {
		$args = func_get_args();
		$methodSig = $this->createMethodSignature("render", $args);
		return $this->getMethodInvokeStm($this->VarName, $methodSig);
	}
	
	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);

		if ($lazy && $this->XType != null) {
			$params[] = $this->paramToString("xtype",$this->XType);
		}
		
		if ($this->ApplyTo != null)
			$params[] = $this->paramToString("applyTo",$this->ApplyTo);
		if ($this->CssClass != null)
			$params[] = $this->paramToString("cls",$this->CssClass);
		if ($this->ContainerCssClass != null)
			$params[] = $this->paramToString("ctCls",$this->ContainerCssClass);			
		if ($this->Id != null)
			$params[] = $this->paramToString("id",$this->Id); 				
		if ($this->RenderTo != null)
			$params[] = $this->paramToString("renderTo",$this->RenderTo);
		if ($this->CssStyle != null)
			$params[] = $this->paramToString("style",$this->CssStyle);			

					
		return $params;
	}
 	
	
}

?>