<?php

$httpHost = "http://".$_SERVER['HTTP_HOST'];
$docRoot = str_replace("\\","/",$_SERVER['DOCUMENT_ROOT']);
$dir = str_replace("\\","/",dirname(__FILE__));
$baseUrl = str_replace($docRoot,$httpHost,$dir);


require_once 'header.php';

$page_id = (isset($_GET['id'])?$_GET['id']:'intro');	
$file = realpath("./".$page_id.".php");
if (file_exists($file))
	require_once $file;
else
	echo "Invalid id: $page_id";

require_once 'footer.php';

?>