<?php
header("Content-type:text/javascript");
include_once("../../php-ext/php-ext.php");

include_once(NS_PHP_EXTJS_CORE);
include_once(NS_PHP_EXTJS_PANELS);

$p = new ExtPanel();
$p->Title = "My Panel";
$p->Collapsible = true;
$p->RenderTo = Javascript::variable("Ext.get('content-box')");
$p->Width = 400;
$p->Html = Javascript::variable("Ext.example.bogusMarkup");  
    
echo Ext::OnReady(
	$p->getJavascript(false, "p")
);
?>