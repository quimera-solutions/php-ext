# Requirements #

PHP-Ext has a few requirements.

  * The first requirement its a web server (Apache, IIS) with PHP enabled.  PHP-Ext works for PHP5.  You can also use server packages like XAMPP for ready-to-use web server with PHP support
> > Requirements Reference:
      * The Apache HTTP Server Project (http://httpd.apache.org/download.cgi)
      * PHP (http://www.php.net/downloads.php)
      * XAMPP (http://www.apachefriends.org/en/xampp.html)

  * The second requiremente is the Ext JS Library which can be downloaded from http://extjs.com/download.  the samples are built to work with extjs-2.0.2

# Step by Step #

## Full version ##
The Full version includes the library files, the [sample](http://php-ext.quimera-solutions.com/examples) pages and the full [API Documentation](http://php-ext.quimera-solutions.com/docs/api).  It also includes a CHM file for offline reference.
  1. Download the php-ext full version from http://code.google.com/p/php-ext/downloads/list
  1. Decompress the php-ext zip file under the document root of the web server
> > This will create the folder php-ext.  This is the installation folder
  1. Decompress the Ext JS zip file under the folder /resources of the installation folder
  1. Go to http://mywebserver/php-ext and enjoy the samples and docs
  1. To use the library in one of your projects, copy the php-ext and the extjs folders to your project path and add an to include the Ext.php file.  See Library Only for further instructions.

## Library Only ##
If you want to include the library in one or all of your projects:
  1. Download the php-ext library version from http://code.google.com/p/php-ext/downloads/list
  1. Open the zip file and copy the php-ext folder into your project path
  1. Decompress the Ext JS zip file under your project path
  1. Include the "Ext.php" file in the script.
  1. Include the corresponding files for the classes you need to use.
  1. For API documentation download the full version

# Useful Links #
  * [Project Website](http://php-ext.quimera-solutions.com)
  * [PHP-Ext Blog](http://php-ext.quimera-solutions.com/blog)
  * [API Documentation](http://php-ext.quimera-solutions.com/docs/api)
  * [PHP-Ext Discussion Group](http://groups.google.com/group/php-ext)