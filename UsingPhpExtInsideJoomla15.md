# Introduction #

I have been working with Joomla! long time ago since the times of mambo and I wanted to add ExtJs functionality.  As we all know, Joomla! is run on PHP, the same language of Php-Ext.  So this tutorial is about how to get PhpExt to work inside Joomla! with any modifications to the Php-Ext code and using Joomla! syntax.


# Details #

## Requirements ##

  1. [Joomla! 1.5.x](http://www.joomla.org)
  1. [PhpExt 0.8.3](http://php-ext.googlecode.com/files/phpext-0.8.3.zip)
  1. [ExtJs](http://extjs.com/products/extjs/download.php?dl=extjs22)

## Files Location ##

Start by installing Joomla! 1.5.x with the normal installation procedure. Installation of Joomla! is not the purpose of this tutorial, so you may check the [Joomla docs](http://docs.joomla.org) page for information on this procedure.

Unzip the PhpExt file and copy the `PhpExt` directory in the `libraries` folder of the Joomla! installation.  Unzip the ExtJs file and copy the `ext-x.x` directory in the `includes\js` directory of the Joomla! installation.  Rename that directory to only `extjs`.

## Test Component ##

For this tutorial, we'll create a test component so that you can have an idea of how to integrate Php-Ext in your Joomla! application.

### Component Files ###

In the `components` directory, create a new folder named `com_phpext_test`. Copy one of the empty `index.html` file from other directory or create it by yourself. This step is optional, but is suggested by the Joomla! guys.

Inside the testing component directory, create a file named `phpext_test.php`. Start the file with the usual Joomla! declaration:

```
<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
```

### Add ExtJs Stylesheet and Javascript files ###

We'll now add the stylesheet and javascript files of ExtJs to the document object. It's a rule of the thumb to place all the stylesheet and javascript declarations inside the `<head>` element of the page, rather than just _echoing_ on the code elsewhere. We'll do it using the `JDocument` and the `JFactory` objects of the Joomla! 1.5 framework.

```
$uri =& JUri::getInstance();
$document =& JFactory::getDocument();
$document->addStyleSheet($uri->base() . 'includes/js/extjs/resources/
css/ext-all.css');
$document->addScript($uri->base() . 'includes/js/extjs/adapter/ext/ext-
base.js');
$document->addScript($uri->base() . 'includes/js/extjs/ext-all.js');
```

We first retrieve the site base address. Then we retrieve the current document object (`JDocument`) using the `getDocument` function (singleton) of the `JFactory` class. Then, we add the stylesheet and javascripts url to the document using the `addStyleSheet` and `addScript` methods of the `JDocument` object. Now we have included the basic stylesheet and the necessary javascript files to start working with ExtJs. Let's move on to the code.

### Add the Php-Ext Directory to the Include Path ###

For Php-Ext to work, its real path must be set in the include\_path directive. We can achieve this with PHP's `set_include_path` function.

```
$path = realpath('.');
$path .= DS . 'libraries';
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
```

### Import the Php-Ext Objects ###

Before we start working with Php-Ext objects, we need to import their declaration. We'll use Joomla!'s built-in function `jimport`.

```
jimport('PhpExt.Javascript');
jimport('PhpExt.Ext');
jimport('PhpExt.Data.SimpleStore');
jimport('PhpExt.Data.ArrayReader');
jimport('PhpExt.Data.JsonReader');
jimport('PhpExt.Data.ScriptTagProxy');
jimport('PhpExt.Data.FieldConfigObject');
jimport('PhpExt.Data.StoreLoadOptions');
jimport('PhpExt.Data.HttpProxy');
jimport('PhpExt.Data.JsonStore');
jimport('PhpExt.Toolbar.PagingToolbar');
jimport('PhpExt.Grid.ColumnModel');
jimport('PhpExt.Grid.ColumnConfigObject');
jimport('PhpExt.Grid.GridPanel');
```

For this example, we'll only use a JSON grid, but you can import as many Php-Ext controls you need. Just remember to use Joomla!'s syntax. Again, refer to the [Joomla! docs](http://docs.joomla.org) for help on the `jimport` function.

### Copy & Paste ###

We'll use the JSON example from the Php-Ext example's page. There are just a couple adjustments to take care of. For the storage, change its url address so that it points to your Joomla! site. You'll need to copy the `json_exampledata.php` file to the root of your Joomla! site or alternative you can make it point to the Php-Ext's site file.

```
// Store
$store = new PhpExt_Data_Store();
$store->setUrl($uri->base() . 'json_exampledata.php')
  ->setReader($reader)
  ->setBaseParams(array("limit"=>$PageSize));
```

Then you need to render the `<script>` and `</script>` tags surrounding the `render` function of the object, and also add the container item.

```
echo '<script type="text/javascript">';
// Ext.OnReady -----------------------
echo PhpExt_Ext::onReady(
       $changeRenderer,
       $pctChangeRenderer,
       $store->getJavascript(false, "store"),
       $store->load(new PhpExt_Data_StoreLoadOptions(array(
                       "start"=>0,"limit"=>$PageSize))
       ),
       $grid->getJavascript(false, "grid"),
       $grid->render("grid-example")
);
echo '</script>';
?><div id="grid-example"></div>
```

## Try It ##

Point your browser to the address http://www.yourdomain.com/yoursite/index.php?option=com_phpext_test and check if it works.

## Have Fun! ##

Try the other examples, build your own templates, components, modules, plugins, integrate other components... the chances are infinite!  Happy coding!