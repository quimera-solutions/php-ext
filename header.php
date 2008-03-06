<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>The PHP-Ext Open Source Project</title>
    <base href="<?php echo $baseUrl; ?>/" />
    
    <link rel="stylesheet" type="text/css" href="site.css" />
    
    
<?php
if (isset($customHeaders))
	echo $customHeaders;
?>

</head>
<body>

<div id="header">
<h1>PHP-Ext</h1>
The Web 2.0 PHP Widget Library using Ext JS

<ul id="menu">
	<li><a href=".">Home</a></li>
	<li><a href="?id=docs">Docs</a></li>
	<li><a href="examples">Samples</a></li>
	<li><a href="?id=download">Download</a></li>
</ul>
 
</div>

<?php
require_once 'sidebar.php';
?>
<div class="content-box" id="content-box">