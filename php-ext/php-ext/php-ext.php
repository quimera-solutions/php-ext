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
define("PHP_EXTJS_DOC_ROOT", realpath(dirname(__FILE__)));

define("NS_PHP_EXTJS_CORE", PHP_EXTJS_DOC_ROOT . "/ns.inc.php");
define("NS_PHP_EXTJS_CONFIG", PHP_EXTJS_DOC_ROOT . "/config/ns.inc.php");
define("NS_PHP_EXTJS_PANELS", PHP_EXTJS_DOC_ROOT . "/panels/ns.inc.php");
define("NS_PHP_EXTJS_FORM", PHP_EXTJS_DOC_ROOT . "/form/ns.inc.php");
define("NS_PHP_EXTJS_GRID", PHP_EXTJS_DOC_ROOT . "/grid/ns.inc.php");
define("NS_PHP_EXTJS_MENU", PHP_EXTJS_DOC_ROOT . "/menu/ns.inc.php");
define("NS_PHP_EXTJS_TOOLBAR", PHP_EXTJS_DOC_ROOT . "/toolbar/ns.inc.php");
define("NS_PHP_EXTJS_DATA", PHP_EXTJS_DOC_ROOT . "/data/ns.inc.php");


define("EXT_ELEMENT_ANCHOR_TOP_LEFT","tl");
define("EXT_ELEMENT_ANCHOR_TOP_CENTER","t");
define("EXT_ELEMENT_ANCHOR_TOP_RIGHT","tr");
define("EXT_ELEMENT_ANCHOR_CENTER_LEFT","l");
define("EXT_ELEMENT_ANCHOR_CENTER","c");
define("EXT_ELEMENT_ANCHOR_CENTER_RIGHT","r");
define("EXT_ELEMENT_ANCHOR_BOTTOM_LEFT","bl");
define("EXT_ELEMENT_ANCHOR_BOTTOM_CENTER","b");
define("EXT_ELEMENT_ANCHOR_BOTTOM_RIGHT","br");

/**
 * @package php-ext
 */
class Ext {
	
	var $Callstack = array(); 
	
	function Ext() {
		
	}
	
	function onReady() {
		$statements = func_get_args();
		$js  = "Ext.onReady(function(){\n";
		foreach($statements as $stm)		
			$js .= Javascript::output($stm)."\n";		
		$js .= "});";

		return $js;
	}

	function combineAnchors($elementAnchor, $targetAnchor) {
		return $elementAnchor."-".$targetAnchor;
	}
		
}


?>