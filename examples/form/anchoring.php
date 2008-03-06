<?php
header("Content-type:text/javascript");
include_once("../../php-ext/php-ext.php");

include_once(NS_PHP_EXTJS_CORE);
include_once(NS_PHP_EXTJS_PANELS);
include_once(NS_PHP_EXTJS_FORM);

$form = new ExtFormPanel();
$form->BaseCssClass = "x-plain";
$form->LabelWidth = 55;
$form->Url = "save-form.php";
$form->DefaultType = "textfield";
$form->FieldsLazyRender = true;

$textfield1 = new ExtTextField(null,"to","Send To");
$textfield1->Anchor = "100%"; // anchor width by percentage
$form->addItem(&$textfield1);

$textfield2 = new ExtTextField(null,"subject","Subject");
$textfield2->Anchor = "100%"; // anchor width by percentage
$form->addItem(&$textfield2);

$textarea = new ExtTextArea(null,"msg");
$textarea->HideLabel = true;
$textarea->Anchor = "100% -53";
$form->addItem(&$textarea);

$window = new ExtWindow();
$window->Title = "Resize Me";
$window->Width = 500;
$window->Height = 300;
$window->MinWidth = 300;
$window->MinHeight = 200;
$window->Layout = EXT_CONTAINER_LAYOUTS_FIT;
$window->Plain = true;
$window->BodyStyle = "padding:5px";
$window->ButtonAlign = EXT_FORM_LABEL_HALIGN_CENTER;
$window->Items->addObject(&$form);
$window->addButton(new ExtButton(null,null,"Send"));
$window->addButton(new ExtButton(null,null,"Cancel"));

echo Ext::onReady(	
	$form->getJavascript(false, "form"),
	$window->getJavascript(false, "window"),
	$window->show()
);

?>