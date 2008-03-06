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
 * @package php-ext
 */
class Javascript {
	
	/**
	 * Returns a variable name
	 * @var string The name of the variable to retrieve
	 * @return JavascriptStm
	 */
	function functionDef($functionName, $functionBody, $functionParams = array()) {
		$functionName = ($functionName === null)?"":" ".$functionName;
		$function = "function$functionName(".implode(",",$functionParams).") {
			$functionBody
		}";
		
		return Javascript::inlineStm($function);
	}	
	/**
	 * Returns a variable name
	 * @var string The name of the variable to retrieve
	 * @return JavascriptStm
	 */
	function variable($varName) {
		return Javascript::inlineStm($varName);
	}
	/**
	 * Creates an assignment statement for an existing variable
	 * @var string The name of the variable to asign to
	 * @var string Javascript statement code 
	 * @return JavascriptStm
	 */
	function assign($varName, $statement) {
		return Javascript::stm($varName."=".$statement);
	}
	/**
	 * Creates an assignment statement for an new variable (in the form 'var foo = 1;')
	 * @var string The name of the variable to asign to
	 * @var string Javascript statement code 
	 * @return JavascriptStm
	 */
	function assignNew($varName, $statement) {
		if (Javascript::isJavascriptStm($statement) 	)
			$stm = $statement->output();
		else
			$stm = $statement;
		return Javascript::stm("var ".$varName."=".$stm);
	}
	
	/**
	 * Creates a javascript statement with a semicolon at the end.
	 * @var string Javascript statement code 
	 * @return JavascriptStm
	 */
	function stm($statement) {
		if (Javascript::isJavascriptStm($statement))
			return Javascript::inlineStm($statement->output().";");
		return Javascript::inlineStm($statement.";");
	}
	/**
	 * Creates a javascript statement without a semicolon at the end.
	 * @var string Javascript statement code 
	 * @return JavascriptStm
	 */
	function inlineStm($statement) {		
		if (Javascript::isJavascriptStm($statement))
			return $statement;		
		return new JavascriptStm($statement);
	}
	/**
	 * 
	 * @var array Receives indefinite parameters. Each paramenters refers to a string or a <code>JavascriptStm</code>
	 * @return string
	 */
	function output() {		
		$statements = func_get_args();
		$evalStms = array();
		foreach($statements as $stm) {					
			if (Javascript::isJavascript($stm) ||
				Javascript::isJavascriptStm($stm)) {				
				$evalStms[] = $stm->output();
				}
			else
				$evalStms[] = $stm;
		}
		$js = implode("\n", $evalStms);
		return $js;
	}
	
	function valueToJavascript($value, $lazy = false) {
		$resolvedValue = $value;
		
		if (is_bool($value))
			$resolvedValue = ($value)?"true":"false";
		else if (is_null($value))
			$resolvedValue = null;
		else if (is_string($value))
			$resolvedValue = "'$value'";
		else if (is_array($value))
			$resolvedValue = Javascript::json_encode($value);			
		else if (ExtObject::isExtObject($value) || ExtObjectCollection::isExtObjectCollection($value))							
			$resolvedValue = $value->getJavascript($lazy);
		else if (Javascript::isJavascript($value) ||
				Javascript::isJavascriptStm($value)) 
			$resolvedValue = $value->output();
		else if (is_object($value))
			$resolvedValue = Javascript::json_encode($value);

		return $resolvedValue;
	}
	
	function json_encode($value) {		
		static $jsonEncoder;
		if ($jsonEncoder == null) {
			include_once(PHP_EXTJS_DOC_ROOT . "/lib/json.php");
			$jsonEncoder = new Services_JSON();
		}
			
		return $jsonEncoder->encode($value);		
	}
	
	function isJavascript($value) {	
		if (is_object($value)) {	
			return (get_class($value) == "javascript" || is_subclass_of($value, "javascript") ||
				get_class($value) == "Javascript" || is_subclass_of($value, "Javascript"));
		}
		return false;
	}
	
	function isJavascriptStm($value) {
		if (is_object($value)) {
			return (get_class($value) == "javascriptstm" || is_subclass_of($value, "javascriptstm") ||
				get_class($value) == "JavascriptStm" || is_subclass_of($value, "JavascriptStm"));
		}
		return false;
	}
	
	function sendContentType() {
		header("Content-type:text/javascript");
	}
}

class JavascriptStm {
	var $Statement = "";
	function JavascriptStm($statement) {
		$this->Statement = $statement;
	}
	function output() {
		return $this->Statement;
	}
}

?>