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
include_once realpath(dirname(__FILE__)."/../../php-ext/php-ext.php");
include_once realpath(PHP_EXTJS_DOC_ROOT."/data/ext-xmlreader.inc.php");

/**
 * @package php-ext-ux
 * @subpackage app
 */
class ExtXmlErrorReader extends ExtXmlReader 
{
	var $Id = null;
	var $Record = null;
	var $Success = null;
	var $Total = null;
	
	function ExtXmlErrorReader() {
		ExtXmlErrorReader::ExtXmlReader();

		$this->setExtClassInfo("Ext.form.XmlErrorReader");		
	}	

}

?>