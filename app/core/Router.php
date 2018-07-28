<?php
 
 //Name Space Of Core Main File
 namespace Core;

 /*
 * Router Class To Handel Any Routing Functionality
 * Run Controller And Method After Handel It
 */

 class Router extends Helpers {

 	/*
	 * Private Static Defualt Controller And Index Method 
 	 */
    
 	private static $controller = 'Home';
 	private static $method = 'index';
 	private static $params = [];



 	//Construct Function To Running Class On Intialze It

    public function __construct() {

    	//Define Url Variable
    	$url = self::paresUrl();


		/*
    	*  If Url Is Null Controller Will Be Home By Defalu
    	*  Or The Url Will Be $url[0] And Unset From Url Array
    	*  Else (Mean The Controller Not Found) Set Error 404 Controller
    	*/
    	if(is_null($url[0])) {
    		self::$controller = self::$controller;
    	}elseif(self::CheckFile('controllers', ucwords($url[0]))) {
    		self::$controller = ucwords($url[0]);
    		unset($url[0]);
    	}


		//Require The Controller If Anything If Is Found
    	require_once '../app/controllers/' . self::$controller . '.php';
    	self::$controller = new self::$controller;

    	//Check If Controller Variable Is Really Object
    	//Then Check If $url[1] Is Really Method Iside Controller Class
    	if(is_object(self::$controller)) {
            if(isset($url[1])) {
        		if(method_exists(self::$controller, $url[1])) {
        			self::$method = $url[1];
        			unset($url[1]);
        		}
            }
    	}

        //Set Function Params Of Specific Controller As Array
    	self::$params = $url ? array_values($url) : [];

        //Call The Specific controller With It Methods And Params Of Methods
    	call_user_func_array([self::$controller, self::$method], self::$params);

    }

 }