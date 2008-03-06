<?php
header("Content-type:text/javascript");
include_once("../../php-ext/php-ext.php");
include_once("../../php-ext-ux/app/ext-searchfield.inc.php");

include_once(NS_PHP_EXTJS_CORE);
include_once(NS_PHP_EXTJS_DATA);
include_once(NS_PHP_EXTJS_FORM);
include_once(NS_PHP_EXTJS_TOOLBAR);

$ds = new ExtStore();
$ds->Proxy =& new ExtScriptTagProxy('http://extjs.com/forum/topics-remote.php');
$ds->Reader =& new ExtJsonReader();
$ds->Reader->Root = "topics";
$ds->Reader->TotalProperty = "totalCount";
$ds->Id = "post_id";
$ds->Reader->addField(new ExtFieldConfigObject("postId","post_id"));
$ds->Reader->addField(new ExtFieldConfigObject("title","topic_title"));
$ds->Reader->addField(new ExtFieldConfigObject("topicId","topic_id"));
$ds->Reader->addField(new ExtFieldConfigObject("author","author"));
$ds->Reader->addField(new ExtFieldConfigObject("lastPost","post_time","date",null,null,null,"timestamp"));
$ds->Reader->addField(new ExtFieldConfigObject("excerpt","post_text"));
$ds->BaseParams = new ExtConfigObject(array("limit"=>20,"forumId"=>4));

$resultTpl = new ExtXTemplate(
		'<tpl for="."><div class="search-item">',
            '<h3><span>{lastPost:date("M j, Y")}<br />by {author}</span>{title}</h3>',
            '{excerpt}',
        '</div></tpl>');

$search = new ExtComboBox(null, "searchbox");
$search->Store =& $ds;
$search->DisplayField = "Title";
$search->TypeAhead = false;
$search->LoadingText = "Searching...";
$search->Width = 570;
$search->PageSize = 10;
$search->HideTrigger = true;
$search->Template =& $resultTpl;
$search->ApplyTo = "search";
$search->ItemCssSelector = "div.search-item";
$search->addListener("onSelect", new ExtListener(
		Javascript::functionDef(null,
			"window.location =
                String.format('http://extjs.com/forum/showthread.php?t={0}&p={1}', record.data.topicId, record.id)",
			array("record"))
		));


//------------ Ext.OnReady
echo Ext::onReady(
	$ds->getJavascript(false, "ds"),
	$resultTpl->getJavascript(false, "resultTpl"),
	$search->getJavascript(false, "search")		
);



?>