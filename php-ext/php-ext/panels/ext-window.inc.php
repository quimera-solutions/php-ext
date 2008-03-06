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
include_once realpath(dirname(__FILE__)."/ext-panel.inc.php");

define("EXT_WINDOW_CLOSE_ACTION_CLOSE","close");
define("EXT_WINDOW_CLOSE_ACTION_HIDE","hide");

/**
 * @package php-ext
 * @subpackage panel
 */
class ExtWindow extends ExtPanel
{
	/**
	 * @var string/JS
	 */
	var $AnimateTarget = null;
	/**
	 * @var boolean
	 */
	var $Closable = true;
	/**
	 * Posible values: EXT_WINDOW_CLOSE_ACTION_CLOSE, EXT_WINDOW_CLOSE_ACTION_HIDE
	 * @var string
	 */
	var $CloseAction = EXT_WINDOW_CLOSE_ACTION_CLOSE;
	/**
	 * @var boolean
	 */
	var $Constrain = false;
	/**
	 * @var boolean
	 */
	var $ConstrainHeader = false;
	/**
	 * @var string/JS
	 */
	var $DefaultButton = null;
	/**
	 * @var boolean
	 */
	var $Draggable = true;
	/**
	 * @var boolean
	 */
	var $ExpandOnShow = true;
	/**
	 * @var JS
	 */
	var $Manager = null;
	/**
	 * @var boolean
	 */
	var $Maximizable = false;
	/**
	 * @var int
	 */
	var $MinHeight = null;
	/**
	 * @var int
	 */
	var $MinWidth = null;
	/**
	 * @var boolean
	 */
	var $Minimizable = false;
	/**
	 * @var boolean
	 */
	var $Modal = false;
	/**
	 * @var ExtHandler
	 */
	var $OnEsc = null;
	/**
	 * @var boolean
	 */
	var $Plain = false;
	/**
	 * @var boolean
	 */
	var $Resizable = true;
	/**
	 * @var ExtConfigObject
	 */
	var $ResizeHandles = null;
	
	
	function ExtWindow() {
		ExtWindow::ExtPanel();
		$this->setExtClassInfo("Ext.Window","window");		
	}	
	
	function show() {
		$args = func_get_args();
		$methodSig = $this->createMethodSignature("show", $args);
		return $this->getMethodInvokeStm($this->VarName, $methodSig);
	}
	
	function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);

		if ($this->AnimateTarget != null)
			$params[] = $this->paramToString("animateTarget",$this->AnimateTarget);
		if (!$this->Closable)
			$params[] = $this->paramToString("closable",$this->Closable);
		if ($this->CloseAction != EXT_WINDOW_CLOSE_ACTION_CLOSE)
			$params[] = $this->paramToString("closeAction",$this->CloseAction);		
		if ($this->Constrain)
			$params[] = $this->paramToString("constrain",$this->Constrain);
		if ($this->ConstrainHeader)
			$params[] = $this->paramToString("constrainHeader",$this->ConstrainHeader);
		if ($this->DefaultButton != null)
			$params[] = $this->paramToString("defaultButton",$this->DefaultButton);
		if (!$this->Draggable)
			$params[] = $this->paramToString("draggable",$this->Draggable);						
		if (!$this->ExpandOnShow)
			$params[] = $this->paramToString("expandOnShow",$this->ExpandOnShow);
		if ($this->Manager != null)
			$params[] = $this->paramToString("manager",$this->Manager);
		if ($this->Maximizable)
			$params[] = $this->paramToString("maximizable",$this->Maximizable);
		if ($this->MinHeight !== null)
			$params[] = $this->paramToString("minHeight",$this->MinHeight);
		if ($this->MinWidth !== null)
			$params[] = $this->paramToString("minWidth",$this->MinWidth);
		if ($this->Minimizable)
			$params[] = $this->paramToString("minimizable",$this->Minimizable);
		if ($this->Modal)
			$params[] = $this->paramToString("modal",$this->Modal);
		if ($this->OnEsc != null)
			$params[] = $this->paramToString("onEsc",$this->OnEsc);
		if ($this->Plain)
			$params[] = $this->paramToString("plain",$this->Plain);
		if (!$this->Resizable)
			$params[] = $this->paramToString("resizable",$this->Resizable);	
		if ($this->ResizeHandles != null)
			$params[] = $this->paramToString("resizeHandles",$this->ResizeHandles);
					
		return $params;
	}
}

?>