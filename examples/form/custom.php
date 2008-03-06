<?php
header("Content-type:text/javascript");
include_once("../../php-ext/php-ext.php");
include_once("../../php-ext-ux/app/ext-searchfield.inc.php");

include_once(NS_PHP_EXTJS_CORE);
include_once(NS_PHP_EXTJS_DATA);
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
		'<tpl for=".">',
        '<div class="search-item">',
            '<h3><span>{lastPost:date("M j, Y")}<br />by {author}</span>',
            '<a href="http://extjs.com/forum/showthread.php?t={topicId}&p={postId}" target="_blank">{title}</a></h3>',
            '<p>{excerpt}</p>',
        '</div></tpl>');

$panel = new ExtPanel();
$panel->ApplyTo = "search-panel";
$panel->Title = "Forum Search";
$panel->Height = 300;
$panel->AutoScroll = true;

$dv =& $panel->addItem(new ExtDataView("div.search-item"));
$dv->Store =& $ds;
$dv->Template =& $resultTpl;

$tb =& new ExtToolbar();
$tb->addText(1,"Search: ");
$tb->addSpacer(2);
$searchField = new ExtSearchField();
$searchField->Store =& $ds;
$searchField->Width = 320;
$tb->addItem(3, &$searchField);
$panel->TopToolbar =& $tb;

$paging = new ExtPagingToolbar();
$paging->Store =& $ds;
$paging->PageSize = 20;
$paging->DisplayInfo = "Topics {0} - {1} of {2}";
$paging->EmptyMessage = "No topics to display";
$panel->BottomToolbar =& $paging;

//------------ Ext.OnReady
echo Ext::onReady(
	$ds->getJavascript(false, "ds"),
	$resultTpl->getJavascript(false, "resultTpl"),
	$panel->getJavascript(false, "panel"),
	$ds->load(new ExtConfigObject(array(
		"params"=>new ExtConfigObject(array(
			"start"=>0,"limit"=>0,"forumId"=>4)))
			)
	)
);



?>