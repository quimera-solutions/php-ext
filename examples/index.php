<?php
$httpHost = "http://".$_SERVER['HTTP_HOST'];
$docRoot = str_replace("\\","/",realpath($_SERVER['DOCUMENT_ROOT']));
$dir = str_replace("\\","/",realpath(dirname(__FILE__)."/.."));
$baseUrl = str_replace($docRoot,$httpHost,$dir);

$extjsCheck = realpath(dirname(__FILE__)."/../resources/ext-2.0.2/ext-core.js");

if ($extjsCheck !== false) {
	include_once '../php-ext/php-ext.php';
	
	include_once(NS_PHP_EXTJS_CORE);
	include_once(NS_PHP_EXTJS_PANELS);
	include_once(NS_PHP_EXTJS_FORM);
	
	$example_id = $_GET['eid'];
	$file = $example_id . ".php";
	
	$w = new ExtWindow();
	$w->Title = "PHP Source: " . $file;
	$w->Width = 500;
	$w->Height = 500;
	$w->Layout = EXT_CONTAINER_LAYOUTS_FIT;
	$w->AutoLoad = new ExtAutoLoadConfigObject($baseUrl."/examples/viewsource.php",array("file"=>$file));
	$w->AutoLoad->Scripts = true;
	$w->AutoLoad->Method = EXT_FORM_METHOD_GET;
	$w->Resizable = false;
	$w->CloseAction = EXT_WINDOW_CLOSE_ACTION_HIDE;
	
	$w2 = new ExtWindow();
	$w2->Title = "Generated JavaScript: " . $file;
	$w2->Width = 500;
	$w2->Height = 500;
	$w2->Layout = EXT_CONTAINER_LAYOUTS_FIT;
	$w2->AutoLoad = new ExtAutoLoadConfigObject($baseUrl."/examples/viewjs.php",array("file"=>$file));
	$w2->AutoLoad->Scripts = true;
	$w2->AutoLoad->Method = EXT_FORM_METHOD_GET;
	$w2->Resizable = false;
	$w2->CloseAction = EXT_WINDOW_CLOSE_ACTION_HIDE;
	
	$customHeaders = '
	    <link rel="stylesheet" type="text/css" href="resources/ext-2.0.2/resources/css/ext-all.css" />
	
	    <!-- GC -->
	 	<!-- LIBS -->
	 	<script type="text/javascript" src="resources/ext-2.0.2/adapter/ext/ext-base.js"></script>
	 	<!-- ENDLIBS -->
	
	    <script type="text/javascript" src="resources/ext-2.0.2/ext-all.js"></script>
	    <script type="text/javascript" src="examples/examples.js"></script>
	    
	    <script type="text/javascript" src="resources/codepress/codepress.js"></script>
	
	    <!-- Common Styles for the examples -->
	    <link rel="stylesheet" type="text/css" href="examples/examples.css" />
	    
	    
	    <script>'.
		$w->getJavascript(false, "w").'
		'.$w2->getJavascript(false, "w2").'
	    </script>';
}


require_once '../header.php';

if ($extjsCheck === false) {
	echo "<p style=\"color:red; font-weight: bold\">Ext JS 2.0.2 Not Installed.  
Please see INSTALL.txt for information regarding proper installation.</p>";
}


$page = (isset($_GET['p'])?$_GET['p']:'intro');

if (!isset($_GET['eid'])) {
	require_once 'examples.php';
}
else {
	$example_id = $_GET['eid'];
	$file = realpath("./".$example_id.".html");
	if (file_exists($file)) {

		if ($extjsCheck !== false) {		
			echo '<button onclick="w.show()" style="float:right">View PHP Source</button>
<button onclick="w2.show()" style="float:right">View Generated JS</button>';
		}
		
		require_once $file;
	}
	else
		echo "Invalid example: $example_id";
}



require_once '../footer.php';

?>