<?php
include_once("../../php-ext/php-ext.php");
include_once("../../php-ext-ux/form/ext-xmlerrorreader.inc.php");

include_once(NS_PHP_EXTJS_CORE);
include_once(NS_PHP_EXTJS_DATA);
include_once(NS_PHP_EXTJS_FORM);
include_once(NS_PHP_EXTJS_PANELS);
include_once(NS_PHP_EXTJS_GRID);

header("Content-type:text/javascript");

$fs = new ExtFormPanel();
$fs->Frame = true;
$fs->Title = "XML Form";
$fs->LabelAlign = EXT_FORM_LABEL_ALIGN_RIGHT;
$fs->LabelWidth = 85;
$fs->Width = 340;
$fs->WaitMsgTarget = true;

// configure how to read the XML Data
$reader =& new ExtXmlReader();
$reader->Record = "contact";
$reader->Success = "@success";
$reader->addField(new ExtFieldConfigObject("first","name/first")); // custom mapping
$reader->addField(new ExtFieldConfigObject("last","name/last"));
$reader->addField(new ExtFieldConfigObject("company","company"));
$reader->addField(new ExtFieldConfigObject("email","email"));
$reader->addField(new ExtFieldConfigObject("state","state"));
$reader->addField(new ExtFieldConfigObject("dob",null,"date",null,null,null,"m/d/Y")); // custom data types
$fs->Reader =& $reader;

$fs->ErrorReader = new ExtXmlErrorReader();
$fset = new ExtFieldSet();
$fset->Title = "Contact Information";
$fset->AutoHeight = true;
$fset->DefaultType = "textfield";
$fset->Defaults = new ExtConfigObject(array("width"=>190));
$fset->addItem(new ExtTextField(null,"first","First Name"));
$fset->addItem(new ExtTextField(null,"last","Last Name"));
$fset->addItem(new ExtTextField(null,"company","Company"));
$fset->addItem(new ExtTextField(null,"email","Email",EXT_FORM_VTYPE_EMAIL));

$combo =& $fset->addItem(new ExtComboBox(null,"state","State"));
$combo->Store =& new ExtSimpleStore();
$combo->Store->addField("abbr");
$combo->Store->addField("state");
$combo->Store->Data = Javascript::variable("Ext.exampledata.states");
$combo->ValueField = "abbr";
$combo->DisplayField = "state";
$combo->TypeAhead = true;
$combo->Mode = EXT_COMBOBOX_MODES_LOCAL;
$combo->TriggerAction = EXT_COMBOBOX_TRIGGERACTION_ALL;
$combo->EmptyText = "Select a state...";
$combo->SelectOnFocus = true;

$date =& $fset->addItem(new ExtDateField(null, "dob", "Data of Birth"));
$date->AllowBlank = false;

$fs->addItem(&$fset);

$fs->addButton(new ExtButton(null,null,"Load", 
	new ExtHandler(Javascript::stm("fs.getForm().load({url:'examples/form/xml-form.xml', waitMsg:'Loading',method: 'GET'})"))
	));

$submitBtn = new ExtButton(null, null, "Submit", 
	new ExtHandler(Javascript::stm("fs.getForm().submit({url:'examples/form/xml-errors.xml', waitMsg:'Saving Data...'})"))
	);		

$fs->addButton($submitBtn);


//****************************** onReady

echo Ext::onReady(
	Javascript::stm(ExtQuickTips::init()),
	Javascript::assign("Ext.form.Field.prototype.msgTarget",Javascript::valueToJavascript(EXT_FORM_MSGTARGETS_SIDE)),
	$fs->getJavascript(false, "fs"),
	Javascript::assignNew("submit",$submitBtn->getJavascript()),
	$fs->render("form-ct")
);
?>