<?php
header("Content-type:text/javascript");
include_once("../../php-ext/php-ext.php");

include_once(NS_PHP_EXTJS_CORE);
include_once(NS_PHP_EXTJS_DATA);
include_once(NS_PHP_EXTJS_GRID);


// Sample Data
$myData = array(
        array('3m Co',71.72,0.02,0.03,'9/1 12:00am'),
        array('Alcoa Inc',29.01,0.42,1.47,'9/1 12:00am'),
        array('Altria Group Inc',83.81,0.28,0.34,'9/1 12:00am'),
        array('American Express Company',52.55,0.01,0.02,'9/1 12:00am'),
        array('American International Group, Inc.',64.13,0.31,0.49,'9/1 12:00am'),
        array('AT&T Inc.',31.61,-0.48,-1.54,'9/1 12:00am'),
        array('Boeing Co.',75.43,0.53,0.71,'9/1 12:00am'),
        array('Caterpillar Inc.',67.27,0.92,1.39,'9/1 12:00am'),
        array('Citigroup, Inc.',49.37,0.02,0.04,'9/1 12:00am'),
        array('E.I. du Pont de Nemours and Company',40.48,0.51,1.28,'9/1 12:00am'),
        array('Exxon Mobil Corp',68.1,-0.43,-0.64,'9/1 12:00am'),
        array('General Electric Company',34.14,-0.08,-0.23,'9/1 12:00am'),
        array('General Motors Corporation',30.27,1.09,3.74,'9/1 12:00am'),
        array('Hewlett-Packard Co.',36.53,-0.03,-0.08,'9/1 12:00am'),
        array('Honeywell Intl Inc',38.77,0.05,0.13,'9/1 12:00am'),
        array('Intel Corporation',19.88,0.31,1.58,'9/1 12:00am'),
        array('International Business Machines',81.41,0.44,0.54,'9/1 12:00am'),
        array('Johnson & Johnson',64.72,0.06,0.09,'9/1 12:00am'),
        array('JP Morgan & Chase & Co',45.73,0.07,0.15,'9/1 12:00am'),
        array('McDonald\'s Corporation',36.76,0.86,2.40,'9/1 12:00am'),
        array('Merck & Co., Inc.',40.96,0.41,1.01,'9/1 12:00am'),
        array('Microsoft Corporation',25.84,0.14,0.54,'9/1 12:00am'),
        array('Pfizer Inc',27.96,0.4,1.45,'9/1 12:00am'),
        array('The Coca-Cola Company',45.07,0.26,0.58,'9/1 12:00am'),
        array('The Home Depot, Inc.',34.64,0.35,1.02,'9/1 12:00am'),
        array('The Procter & Gamble Company',61.91,0.01,0.02,'9/1 12:00am'),
        array('United Technologies Corporation',63.26,0.55,0.88,'9/1 12:00am'),
        array('Verizon Communications',35.57,0.39,1.11,'9/1 12:00am'),
        array('Wal-Mart Stores, Inc.',45.45,0.73,1.63,'9/1 12:00am')
    );
    
    
$changeRenderer = Javascript::functionDef("change","if(val > 0){
            return '<span style=\"color:green;\">' + val + '</span>';
        }else if(val < 0){
            return '<span style=\"color:red;\">' + val + '</span>';
        }
        return val;",array("val"));
$pctChangeRenderer = Javascript::functionDef("pctChange","if(val > 0){
            return '<span style=\"color:green;\">' + val + '%</span>';
        }else if(val < 0){
            return '<span style=\"color:red;\">' + val + '%</span>';
        }
        return val;",array("val"));
// Store
$store = new ExtSimpleStore();
$store->addField(new ExtFieldConfigObject("company"));
$store->addField(new ExtFieldConfigObject("price",null,"float"));
$store->addField(new ExtFieldConfigObject("change",null,"float"));
$store->addField(new ExtFieldConfigObject("pctChange",null,"float"));
$store->addField(new ExtFieldConfigObject("lastChange",null,"date",null,null,null,"n/j h:ia"));

// ColumnModel
$colModel = new ExtColumnModel();
$colModel->addColumn(new ExtColumnConfigObject("Company","company","company",null, true, 160, false));
$colModel->addColumn(new ExtColumnConfigObject("Price","price",null,Javascript::variable("Ext.util.Format.usMoney"), true, 75));
$colModel->addColumn(new ExtColumnConfigObject("Change","change",null,Javascript::variable(change), true, 75));
$colModel->addColumn(new ExtColumnConfigObject("% Change","pctChange",null,Javascript::variable(pctChange), true, 75));
$colModel->addColumn(new ExtColumnConfigObject("Last Updated","lastChange",null,Javascript::variable("Ext.util.Format.dateRenderer('m/d/Y')"), true, 85));

// Grid
$grid = new ExtGridPanel();
$grid->Store =& $store;
$grid->ColumnModel =& $colModel;
$grid->StripeRows = true;
$grid->AutoExpandColumn = "company";
$grid->Height = 350;
$grid->Width = 600;
$grid->Title = "Array Grid";

// Ext.OnReady -----------------------
echo Ext::onReady(
	Javascript::assignNew("myData",Javascript::valueToJavascript($myData)),
	$changeRenderer,
	$pctChangeRenderer,
	$store->getJavascript(false, "store"),
	$store->loadData(Javascript::variable("myData")),
	$grid->getJavascript(false, "grid"),
	$grid->render("grid-example")
);


?>