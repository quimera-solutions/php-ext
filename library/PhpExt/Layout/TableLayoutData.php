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
 * @see PhpExt_Layout_ContainerLayoutData 
 */
include_once 'PhpExt/Layout/ContainerLayoutData.php';


/**
 * Specifies the corresponding Rowspan and Colspan for each of the elements added to the container having TableLayout
 * 
 * Used when using {@link PhpExt_Layout_TableLayout} as the container's layout.	 
 *  
 * @see PhpExt_Layout_TableLayout
 * @see PhpExt_Container::setLayout()
 * @package PhpExt
 * @subpackage Layout
 */
class PhpExt_Layout_TableLayoutData extends PhpExt_Layout_ContainerLayoutData 
{	
    // ColSpan
    /**
     * Colspan works exactly like its HTML counterpart.
     * @see PhpExt_Layout_TableLayout
     * @param integer $value 
     * @return PhpExt_Container
     */
    public function setColSpan($value) {
    	$this->setExtLayoutConfigProperty("colspan", $value);
    	return $this;
    }	
    /**
     * Colspan works exactly like its HTML counterpart.
     * @see PhpExt_Layout_TableLayout
     * @return integer
     */
    public function getColSpan() {
    	return $this->getExtConfigProperty("colspan");
    }
    
    // RowSpan
    /**
     * Rowspan works exactly like its HTML counterpart.
     * @see PhpExt_Layout_TableLayout
     * @param integer $value 
     * @return PhpExt_Container
     */
    public function setRowSpan($value) {
    	$this->setExtLayoutConfigProperty("rowspan", $value);
    	return $this;
    }	
    /**
     * Rowspan works exactly like its HTML counterpart.
     * @see PhpExt_Layout_TableLayout
     * @return integer
     */
    public function getRowSpan() {
    	return $this->getExtConfigProperty("rowspan");
    }    
    
    
	public function __construct($colspan = null, $rowspan = null) {
		parent::__construct();		
		
		$this->setLayoutProperty("colspan",$colspan);
		$this->setLayoutProperty("rowspan",$rowspan);
	}		
 	
	
}

