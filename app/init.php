<?php

 //Start Session Function
 session_start();

 //Require Config File
 require_once 'config/config.php';

 //Require SpreadSheet Excel Reader Libraries
 require_once 'resources/libraries/spreadsheetreader/SpreadsheetReader_XLSX.php';
 require_once 'resources/libraries/spreadsheetreader/SpreadsheetReader_XLS.php';
 require_once 'resources/libraries/spreadsheetreader/SpreadsheetReader.php';


 //Init All Core Classes
 //require_once As 'core/Router.php'; And Other Classes 
 spl_autoload_register(function($class) {
 	require_once 'core/'. str_replace('Core\\', '/', $class) .'.php';
 });