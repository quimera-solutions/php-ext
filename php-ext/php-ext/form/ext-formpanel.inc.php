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
include_once realpath(dirname(__FILE__)."/../panels/ext-panel.inc.php");;

define("EXT_FORM_MSGTARGETS_DEFAULT",null);
define("EXT_FORM_MSGTARGETS_QTIP","qtip");
define("EXT_FORM_MSGTARGETS_TITLE","title");
define("EXT_FORM_MSGTARGETS_UNDER","under");
define("EXT_FORM_MSGTARGETS_SIDE","side");

define("EXT_FORM_BUTTON_HALIGN_LEFT","left");
define("EXT_FORM_BUTTON_HALIGN_CENTER","center");
define("EXT_FORM_BUTTON_HALIGN_RIGHT","right");

define("EXT_FORM_LABEL_ALIGN_LEFT","left");
define("EXT_FORM_LABEL_ALIGN_TOP","top");
define("EXT_FORM_LABEL_ALIGN_RIGHT","right");

define("EXT_FORM_METHOD_GET","GET");
define("EXT_FORM_METHOD_POST","POST");

define("EXT_FORM_VTYPE_ALPHAMASK","alpha");
define("EXT_FORM_VTYPE_ALPHANUM","alphanum");
define("EXT_FORM_VTYPE_EMAIL","email");
define("EXT_FORM_VTYPE_URL","url");

/**
 * @package php-ext
 * @subpackage form
 */
class ExtFormPanel extends ExtPanel 
{	

	// Config Parameters		
	var $ItemCssClass = null;
	var $LabelAlign = EXT_FORM_LABEL_HALIGN_LEFT;
	var $LabelWidth = null;
	var $MonitorPoll = null;
	var $MonitorValid = null;		
	
	// BaseForm Config Parameters
	var $BaseParams = null;
	/**
	 * Error Reader
	 *
	 * @var ExtDataReader
	 */
	var $ErrorReader = null;
	var $FileUpload = false;
	var $Method = EXT_FORM_METHOD_POST;
	var $Reader = null;
	var $Timeout = null;
	var $TrackResetOnLoad = null;
	var $Url = null;
	var $WaitMsgTarget = null;	
	
	var $FieldsLazyRender = true;
	
	function ExtFormPanel($id = null, $url = null) {
		ExtFormPanel::ExtPanel();
		$this->setExtClassInfo("Ext.FormPanel","form");
				
		$this->Id = $id;
		$this->Url = $url;
		
		// Defaults
		$this->ButtonAlign = EXT_PANEL_HALIGN_CENTER;
	}
		
	function getConfigParams($lazy) {				
		$params = parent::getConfigParams($lazy);
		
		if ($this->ButtonAlign != EXT_PANEL_HALIGN_CENTER) {
			if (isset($params['buttonAlign']))
				unset($params['buttonAlign']);
			$params[] = $this->paramToString("buttonAlign",$this->ButtonAlign);
		}
		if ($this->ItemCssClass != null)
			$params[] = $this->paramToString("itemCls",$this->LabelAlign);
		if ($this->LabelAlign != null)
			$params[] = $this->paramToString("labelAlign",$this->LabelAlign);
		if ($this->LabelWidth != null)
			$params[] = $this->paramToString("labelWidth",$this->LabelWidth);
		if ($this->MonitorPoll != null)
			$params[] = $this->paramToString("monitorPoll",$this->MonitorPoll);
		if ($this->MonitorValid != null)
			$params[] = $this->paramToString("monitorValid",$this->MonitorValid);

		// Basic Form Config Params
		if ($this->BaseParams != null)
			$params[] = $this->paramToString("baseParams", $this->BaseParams);
		if ($this->ErrorReader != null)
			$params[] = $this->paramToString("errorReader", $this->ErrorReader);
		if ($this->FileUpload)		
			$params[] = $this->paramToString("fileUpload",$this->FileUpload);				
		if ($this->Method != EXT_FORM_METHOD_POST)
			$params[] = $this->paramToString("method",$this->Method);
		if ($this->Reader != null)
		 	$params[] = $this->paramToString("reader", $this->Reader);
		if ($this->Timeout != null)
		 	$params[] = $this->paramToString("timeout", $this->Timeout);
		if ($this->TrackResetOnLoad != null)
		 	$params[] = $this->paramToString("trackResetOnLoad", $this->TrackResetOnLoad);
		if ($this->Url != null)
			$params[] = $this->paramToString("url",$this->Url);		 	
		if ($this->WaitMsgTarget != null)
			$params[] = $this->paramToString("waitMsgTarget",$this->WaitMsgTarget);	
							
		return $params;
	}
}

?>