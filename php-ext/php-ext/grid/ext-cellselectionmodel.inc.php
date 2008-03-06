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
include_once realpath(dirname(__FILE__)."/../ext-observable.inc.php");

/**
 * @package php-ext
 * @subpackage grid
 */
class ExtCellSelectionModel extends ExtAbstractSelectionModel  
{	

	function ExtCellSelectionModel() {
		ExtCellSelectionModel::ExtAbstractSelectionModel();
		$this->setExtClassInfo("Ext.grid.RowSelectionModel");
	
	}				

}



?>