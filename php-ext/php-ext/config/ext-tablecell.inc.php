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
include_once realpath(dirname(__FILE__)."/ext-configobject.inc.php");


/**
 * @package php-ext
 * @subpackage config
 */
class ExtTableCell extends ExtConfigObject
{
	var $Html;
	var $RowSpan = null;
	var $ColSpan = null;
		
	function ExtTableCell($html, $colspan = null, $rowspan = null) {
		ExtTableCell::ExtConfigObject();

		$this->Html = $html;		
		$this->ColSpan = $colspan;
		$this->RowSpan = $rowspan;
	}
	
	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);
		
		$params[] = $this->paramToString("html",$this->Html);
		
		if ($this->RowSpan != null)
			$params[] = $this->paramToString("rowspan",$this->RowSpan);
		if ($this->ColSpan != null)
			$params[] = $this->paramToString("colspan",$this->ColSpan);		
			
		return $params;
	}
 	
	
}

?>