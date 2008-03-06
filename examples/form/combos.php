<?php
header("Content-type:text/javascript");
include_once("../../php-ext/php-ext.php");

include_once(NS_PHP_EXTJS_CORE);
include_once(NS_PHP_EXTJS_DATA);
include_once(NS_PHP_EXTJS_FORM);

// simple array store
$store = new ExtSimpleStore();
$store->Fields->addObject(new ExtFieldConfigObject("abbr"));
$store->Fields->addObject(new ExtFieldConfigObject("state"));
$store->Fields->addObject(new ExtFieldConfigObject("nick")); 
$store->Data = Javascript::variable("Ext.exampledata.states"); // from states.js

$combo = new ExtComboBox(null, null);
$combo->Store =& $store;
$combo->DisplayField = "state";
$combo->TypeAhead = true;
$combo->Mode = EXT_COMBOBOX_MODES_LOCAL;
$combo->TriggerAction = EXT_COMBOBOX_TRIGGERACTION_ALL;
$combo->EmptyText = "Select a state...";
$combo->SelectOnFocus = true;
$combo->ApplyTo = "local-states";

$comboWithTooltip = new ExtComboBox(null, null);
$comboWithTooltip->Template = '<tpl for="."><div ext:qtip="{state}. {nick}" class="x-combo-list-item">{state}</div></tpl>';
$comboWithTooltip->Store =& $store;
$comboWithTooltip->DisplayField = "state";
$comboWithTooltip->TypeAhead = true;
$comboWithTooltip->Mode = EXT_COMBOBOX_MODES_LOCAL;
$comboWithTooltip->TriggerAction = EXT_COMBOBOX_TRIGGERACTION_ALL;
$comboWithTooltip->EmptyText = "Select a state...";
$comboWithTooltip->SelectOnFocus = true;
$comboWithTooltip->ApplyTo = "local-states-with-qtip";

$converted = new ExtComboBox(null, null);
$converted->TypeAhead = true;
$converted->TriggerAction = EXT_COMBOBOX_TRIGGERACTION_ALL;
$converted->Transform = "state";
$converted->Width = 135;
$converted->ForceSelection = true;
    
echo Ext::onReady(
	ExtQuickTips::init(),
	$store->getJavascript(false, "store"),
	$combo->getJavascript(false, "combo"),	
	$comboWithTooltip->getJavascript(false, "comboWithTooltip"),
	$converted->getJavascript(false, "converted")
);

?>