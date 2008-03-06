<?php
header("Content-type:text/javascript");
include_once("../../php-ext/php-ext.php");

include_once(NS_PHP_EXTJS_CORE);
include_once(NS_PHP_EXTJS_PANELS);
include_once(NS_PHP_EXTJS_TOOLBAR);

$data = array(
	'name'=>'Jack Slocum',
    'company'=> 'Ext JS, LLC',
    'address'=> '4 Red Bulls Drive',
    'city'=> 'Cleveland',
    'state'=> 'Ohio',
    'zip'=> '44102',
    'kids'=> array ( array(
            'name'=>'Sara Grace',
            'age'=>3
            ),array(
            'name'=>'Zachary',
            'age'=>2
            ),array(
            'name'=>'John James',
            'age'=>0
            ))
);


/* Example 1: Basic Template */
$t = new ExtTemplate(
	"<p>Name: {name}</p>",
	"<p>Company: {company}</p>",
	'<p>Location: {city}, {state}</p>');
	
$p =& new ExtPanel();
$p->Title = 'Basic Template';
$p->Width = '300';
$p->Html = '<p><i>Apply the template to see results here</i></p>';
$tb =& new ExtToolbar();
$tb->addButton("apply","Apply Template", null, 
	new ExtHandler(Javascript::stm($t->getJavascript(false,"tpl")),$t->overwrite(Javascript::variable("p.body"),Javascript::variable("data")))
	);
$p->TopToolbar =& $tb;
$p->RenderTo = Javascript::inlineStm("Ext.get('content-box')");


/** Example 2: XTemplate */
$t2 = new ExtXTemplate(
	'<p>Name: {name}</p>',
    '<p>Company: {company}</p>',
    '<p>Location: {city}, {state}</p>',
    '<p>Kids: ',
    '<tpl for="kids" if="name==\\\'Jack Slocum\\\'">',
    '<tpl if="age &gt; 1"><p>{#}. {parent.name}\\\'s kid - {name}</p></tpl>',
    '</tpl></p>');
//$t2->VarName = "tpl2";

$p2 =& new ExtPanel();
$p2->Title = 'XTemplate';
$p2->Width = '300';
$p2->Html = '<p><i>Apply the template to see results here</i></p>';
$tb2 =& new ExtToolbar();
$tb2->addButton("apply","Apply Template", null, 
	new ExtHandler(Javascript::stm($t2->getJavascript(false,"tpl2")),$t2->overwrite(Javascript::variable("p2.body"),Javascript::variable("data")))
	);
$p2->TopToolbar =& $tb2;
$p2->RenderTo = Javascript::variable("Ext.get('content-box')");

echo Ext::onReady(
	Javascript::stm("var data = ".Javascript::json_encode($data).";"),
	$p->getJavascript(false, "p"),
	$p2->getJavascript(false, "p2")
);





?>