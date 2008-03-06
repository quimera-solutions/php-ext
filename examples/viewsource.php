<?php
header("Content-type:text/javascript");
include_once("../php-ext/php-ext.php");

include_once(NS_PHP_EXTJS_CORE);
include_once(NS_PHP_EXTJS_FORM);


if(isset($_GET['file'])) {
	$file = $_GET['file'];
	$full_file = $file;
	if(file_exists($full_file)) {
		$code = file_get_contents($full_file);
		$script = "";
		$readonly = "readonly=\"readonly\"";
		$codepress = realpath(dirname(__FILE__)."/../resources/codepress/codepress.js");
		if (file_exists($codepress)) {
			$script = "<script>
	t = document.getElementById('phpsrc');
	id = t.id;
	t.id = id+'_cp';
	eval(id+' = new CodePress(t)');
	t.parentNode.insertBefore(eval(id), t);	
</script>";
			$readonly = "";
		}
		
		
		echo "
<textarea $readonly id=\"phpsrc\" class=\"codepress php linenumbers-off readonly-on\" style=\"width:485px;height:460px;\" wrap=\"off\">
".$code."
</textarea>
$script
";
		
	}
}
?>