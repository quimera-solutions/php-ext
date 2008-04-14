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
 * @see PhpExt_Config_ConfigObject
 */
include_once 'PhpExt/Grid/ColumnConfigObject.php';

/**
 * This is a utility class that can be passed into a {@link PhpExt_Grid_ColumnModel} as a column config that provides an automatic row numbering column.
 * Usually it is used as the first column added to the collection 
 * @package PhpExt
 * @subpackage Grid
 */
class PhpExt_Grid_RowNumberer extends PhpExt_Grid_ColumnConfigObject
{
    
	public function __construct() {
		parent::__construct('');
					
	}	
	
	public static function getInstance() {
	    return new self(); 
	}
}

