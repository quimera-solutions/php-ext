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
class ExtQuickTips extends ExtObject {

	var $Listeners = array();
	
	function ExtObservable() {
		ExtObservable::ExtObject();	

		$this->setExtClassInfo("Ext.QuickTips");
	}		
	
	function disable() {		
		$mc = ExtObject::createMethodSignature("disable", array(), true);
		return ExtObject::getMethodInvokeStm("Ext.QuickTips", $mc, true);
	}
		
	function enable() {		
		$mc = ExtObject::createMethodSignature("enable", array(), true);
		return ExtObject::getMethodInvokeStm("Ext.QuickTips", $mc, true);
	}

	function getQuickTip() {		
		$mc = ExtObject::createMethodSignature("getQuickTip", array(), true);
		return ExtObject::getMethodInvokeStm("Ext.QuickTips", $mc, true);
	}

	function init() {		
		$mc = ExtObject::createMethodSignature("init", array(), true);
		return ExtObject::getMethodInvokeStm("Ext.QuickTips", $mc, true);
	}

	function isEnabled() {		
		$mc = ExtObject::createMethodSignature("isEnabled", array(), true);
		return ExtObject::getMethodInvokeStm("Ext.QuickTips", $mc, true);
	}

	function register() {		
		$mc = ExtObject::createMethodSignature("register", array(), true);
		return ExtObject::getMethodInvokeStm("Ext.QuickTips", $mc, true);
	}	
	
	function tips() {		
		$mc = ExtObject::createMethodSignature("tips", array(), true);
		return ExtObject::getMethodInvokeStm("Ext.QuickTips", $mc, true);
	}

	function unregister() {		
		$mc = ExtObject::createMethodSignature("unregister", array(), true);
		return ExtObject::getMethodInvokeStm("Ext.QuickTips", $mc, true);
	}

}
?>