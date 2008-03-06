<?php
header("Content-type:text/javascript");
include_once("../../php-ext/php-ext.php");

include_once(NS_PHP_EXTJS_CORE);
include_once(NS_PHP_EXTJS_DATA);
include_once(NS_PHP_EXTJS_FORM);
include_once(NS_PHP_EXTJS_PANELS);

//****************************** Simple Form
$simple = new ExtFormPanel();
$simple->LabelWidth = 75;
$simple->Url = "save-form.php";
$simple->Frame = true;
$simple->Title = "Simple Form";
$simple->BodyStyle = "padding:5px 5px 0";
$simple->Width = 350;
$simple->Defaults = new ExtConfigObject(array("width"=>230));
$simple->DefaultType = "textfield";

$tf1 =& $simple->addItem(new ExtTextField(null,"first","First Name"));
$tf1->AllowBlank = false;

$simple->addItem(new ExtTextField(null,"last","Last Name"));
$simple->addItem(new ExtTextField(null,"company","Company"));

$tf2 =& $simple->addItem(new ExtTextField(null,"email","Email"));
$tf2->VType = EXT_FORM_VTYPE_EMAIL;

$tf3 =& $simple->addItem(new ExtTimeField(null, "time", "Time"));
$tf3->MinValue = "8:00am";
$tf3->MaxValue = "6:00pm";

$simple->addButton(new ExtButton(null,null,"Save"));
$simple->addButton(new ExtButton(null,null,"Cancel"));





//****************************** Adding Fieldset
$fsf = new ExtFormPanel();
$fsf->LabelWidth = 75;
$fsf->Url = "save-form.php";
$fsf->Frame = true;
$fsf->Title = "Simple Form with FieldSets";
$fsf->BodyStyle = "padding:5px 5px 0";
$fsf->Width = 350;

//- Fielset 1
$fieldset1 = new ExtFieldSet();
$fieldset1->CheckboxToggle = true;
$fieldset1->Title = "User Information";
$fieldset1->AutoHeight = true;
$fieldset1->Defaults = new ExtConfigObject(array("width"=>210));
$fieldset1->Collapsed = true;

$tf3 =& $fieldset1->addItem(new ExtTextField(null,"first","First Name"));
$tf3->AllowBlank = false;
$fieldset1->addItem(new ExtTextField(null,"last","Last Name"));
$fieldset1->addItem(new ExtTextField(null,"company","Company"));
$tf4 = $fieldset1->addItem(new ExtTextField(null,"email","Email"));
$tf4->VType = EXT_FORM_VTYPE_EMAIL;

$fsf->addItem(&$fieldset1);

//- Fieldset 2
$fieldset2 = new ExtFieldSet();
$fieldset2->Title = "Phone Number";
$fieldset2->Collapsible = true;
$fieldset2->AutoHeight = true;
$fieldset2->Defaults = new ExtConfigObject(array("width"=>210));

$tf5 =& $fieldset2->addItem(new ExtTextField(null,"home","Home"));
$tf5->Value = "(888) 555-1212";
$fieldset2->addItem(new ExtTextField(null,"business","Business"));
$fieldset2->addItem(new ExtTextField(null,"mobile","Mobile"));
$fieldset2->addItem(new ExtTextField(null,"fax","Fax"));

$fsf->addItem(&$fieldset2);

$fsf->addButton(new ExtButton(null,null,"Save"));
$fsf->addButton(new ExtButton(null,null,"Cancel"));





//****************************** A little more complex
$top = new ExtFormPanel();
$top->LabelAlign = EXT_FORM_LABEL_ALIGN_TOP;
$top->Frame = true;
$top->Title = "Multi Column, Nested Layouts and Anchoring";
$top->BodyStyle = "padding:5px 5px 0";
$top->Width = 600;

$columnPanel = new ExtPanel();
$columnPanel->Layout = EXT_CONTAINER_LAYOUTS_COLUMN;
$top->addItem(&$columnPanel);

$panel1 = new ExtPanel();
$panel1->ColumnWidth = 0.5;
$panel1->Layout = EXT_CONTAINER_LAYOUTS_FORM;
$tf6 =& $panel1->addItem(new ExtTextField(null, "first","First Name"));
$tf6->Anchor = "95%";
$tf7 =& $panel1->addItem(new ExtTextField(null, "company","Company"));
$tf7->Anchor = "95%";
$columnPanel->addItem(&$panel1);

$panel2 = new ExtPanel();
$panel2->ColumnWidth = 0.5;
$panel2->Layout = EXT_CONTAINER_LAYOUTS_FORM;
$tf8 =& $panel2->addItem(new ExtTextField(null, "last","Last Name"));
$tf8->Anchor = "95%";
$tf9 =& $panel2->addItem(new ExtTextField(null, "email","Email"));
$tf9->Anchor = "95%";
$tf9->VType = EXT_FORM_VTYPE_EMAIL;
$columnPanel->addItem(&$panel2);

$html = new ExtHtmlEditor("bio","bio","Biography");
$html->Height = 200;
$html->Anchor = "98%";
$top->addItem(&$html);

$top->addButton(new ExtButton(null,null,"Save"));
$top->addButton(new ExtButton(null,null,"Cancel"));






//****************************** Form as Tabs
$tabs = new ExtFormPanel();
$tabs->Border = false;
$tabs->LabelWidth = 75;
$tabs->Width = 350;

$tabPanel = new ExtTabPanel();
$tabPanel->ActiveTab = 0;
$tabPanel->Defaults = new ExtConfigObject(array("autoHeight"=>true,"bodyStyle"=>"padding:10px"));

$panel3 = new ExtPanel();
$panel3->Title = "Personal Details";
$panel3->Layout = EXT_CONTAINER_LAYOUTS_FORM;
$panel3->Defaults = new ExtConfigObject(array("width"=>230));
$panel3->DefaultType = "textfield";
$tf10 =& $panel3->addItem(new ExtTextField(null, "first","First Name"));
$tf10->AllowBlank = false;
$tf10->Value = "Jack";
$tf11 =& $panel3->addItem(new ExtTextField(null, "company","Company"));
$tf11->Value = "Slocum";
$tf12 =& $panel3->addItem(new ExtTextField(null, "last","Last Name"));
$tf12->Value = "Ext JS";
$tf13 =& $panel3->addItem(new ExtTextField(null, "email","Email"));
$tf13->VType = EXT_FORM_VTYPE_EMAIL;

$panel4 = new ExtPanel();
$panel4->Title = "Phone Numbers";
$panel4->Layout = EXT_CONTAINER_LAYOUTS_FORM;
$panel4->Defaults = new ExtConfigObject(array("width"=>230));
$panel4->DefaultType = "textfield";
$tf14 =& $panel4->addItem(new ExtTextField(null,"home","Home"));
$tf14->Value = "(888) 555-1212";
$panel4->addItem(new ExtTextField(null,"business","Business"));
$panel4->addItem(new ExtTextField(null,"mobile","Mobile"));
$panel4->addItem(new ExtTextField(null,"fax","Fax"));

$tabPanel->addItem(&$panel3);
$tabPanel->addItem(&$panel4);
$tabs->addItem(&$tabPanel);

$top->addButton(new ExtButton(null,null,"Save"));
$top->addButton(new ExtButton(null,null,"Cancel"));


//******************************* Form Tabs 2

$tabs2 = new ExtFormPanel();
$tabs2->LabelAlign = EXT_FORM_LABEL_ALIGN_TOP;
$tabs2->Title = "Inner Tabs";
$tabs2->BodyStyle = "padding:5px";
$tabs2->Width = 600;

$columnPanel = new ExtPanel();
$columnPanel->Layout = EXT_CONTAINER_LAYOUTS_COLUMN;
$columnPanel->Border = false;
$tabs2->addItem(&$columnPanel);

$panel5 = new ExtPanel();
$panel5->ColumnWidth = 0.5;
$panel5->Layout = EXT_CONTAINER_LAYOUTS_FORM;
$panel5->Border = false;
$tf6 =& $panel5->addItem(new ExtTextField(null, "first","First Name"));
$tf6->Anchor = "95%";
$tf7 =& $panel5->addItem(new ExtTextField(null, "company","Company"));
$tf7->Anchor = "95%";
$columnPanel->addItem(&$panel5);

$panel6 = new ExtPanel();
$panel6->ColumnWidth = 0.5;
$panel6->Layout = EXT_CONTAINER_LAYOUTS_FORM;
$panel6->Border = false;
$tf8 =& $panel6->addItem(new ExtTextField(null, "last","Last Name"));
$tf8->Anchor = "95%";
$tf9 =& $panel6->addItem(new ExtTextField(null, "email","Email"));
$tf9->Anchor = "95%";
$tf9->VType = EXT_FORM_VTYPE_EMAIL;
$columnPanel->addItem(&$panel6);

$tabPanel2 = new ExtTabPanel();
$tabPanel2->Plain = true;
$tabPanel2->ActiveTab = 0;
$tabPanel2->Height = 235;
$tabPanel2->Defaults = new ExtConfigObject(array("bodyStyle"=>"padding:10px"));

$panel7 = new ExtPanel();
$panel7->Title = "Personal Details";
$panel7->Layout = EXT_CONTAINER_LAYOUTS_FORM;
$panel7->Defaults = new ExtConfigObject(array("width"=>230));
$panel7->DefaultType = "textfield";
$tf10 =& $panel7->addItem(new ExtTextField(null, "first","First Name"));
$tf10->AllowBlank = false;
$tf10->Value = "Jack";
$tf11 =& $panel7->addItem(new ExtTextField(null, "company","Company"));
$tf11->Value = "Slocum";
$tf12 =& $panel7->addItem(new ExtTextField(null, "last","Last Name"));
$tf12->Value = "Ext JS";
$tf13 =& $panel7->addItem(new ExtTextField(null, "email","Email"));
$tf13->VType = EXT_FORM_VTYPE_EMAIL;

$panel8 = new ExtPanel();
$panel8->Title = "Phone Numbers";
$panel8->Layout = EXT_CONTAINER_LAYOUTS_FORM;
$panel8->Defaults = new ExtConfigObject(array("width"=>230));
$panel8->DefaultType = "textfield";
$tf14 =& $panel8->addItem(new ExtTextField(null,"home","Home"));
$tf14->Value = "(888) 555-1212";
$panel8->addItem(new ExtTextField(null,"business","Business"));
$panel8->addItem(new ExtTextField(null,"mobile","Mobile"));
$panel8->addItem(new ExtTextField(null,"fax","Fax"));

$panel9 = new ExtPanel();
$panel9->CssClass = "x-plain";
$panel9->Title = "Biography";
$panel9->Layout = EXT_CONTAINER_LAYOUTS_FIT;
$panel9->addItem(new ExtHtmlEditor("bio2","bio2","Biography"));

$tabPanel2->addItem(&$panel7);
$tabPanel2->addItem(&$panel8);
$tabPanel2->addItem(&$panel9);
$tabs2->addItem(&$tabPanel2);

$tabs2->addButton(new ExtButton(null,null,"Save"));
$tabs2->addButton(new ExtButton(null,null,"Cancel"));

//****************************** onReady

echo Ext::onReady(
	ExtQuickTips::init(),
	Javascript::assign("bd","Ext.get('content-box')"),
	Javascript::stm("bd.createChild({tag: 'h2', html: 'Form 1 - Very Simple'})"),
	$simple->getJavascript(false, "simple"),	
	$simple->render(Javascript::variable("Ext.get('content-box')")),
	Javascript::stm("bd.createChild({tag: 'h2', html: 'Form 2 - Adding fieldsets'})"),
	$fsf->getJavascript(false, "fsf"),
	$fsf->render(Javascript::variable("Ext.get('content-box')")),
	Javascript::stm("bd.createChild({tag: 'h2', html: 'Form 3 - A little more complex'})"),
	$top->getJavascript(false, "top"),
	$top->render(Javascript::variable("Ext.get('content-box')")),
	Javascript::stm("bd.createChild({tag: 'h2', html: 'Form 4 - Forms can be a TabPanel...'})"),
	$tabs->getJavascript(false, "tabs"),
	$tabs->render(Javascript::variable("Ext.get('content-box')")),
	Javascript::stm("bd.createChild({tag: 'h2', html: 'Form 5 - ... and forms can contain TabPanel(s)'})"),
	$tabs2->getJavascript(false, "tabs2"),
	$tabs2->render(Javascript::variable("Ext.get('content-box')"))
);

?>