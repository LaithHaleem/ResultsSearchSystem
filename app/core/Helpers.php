<?php

 //Name Space Of Core Main File
 namespace Core;

 /*
 * Helper Class To Getting Useful Functions That Depending On It
 * Helpers Class Will Extends With All Core Classes
 */

 class Helpers {

 	//Function To Generate Random Hash
 	public static function getHash($randNum) {
 		return hash('ripemd160', sha1(md5(random_bytes($randNum))));
 	}
 	
 	// Function To Checking If File Is Exists
 	protected static function CheckFile($dir, $file) {
 		if(file_exists('../app/'. $dir .'/' . $file . '.php')) {
 			return true;
 		}
 		return false;
 	}

 	//Private Function To Filtering And Initiaze Url To Use In Route
 	protected static function paresUrl() {
 		if(isset($_GET['url']) && !empty($_GET['url'])) {
 			$url = rtrim($_GET['url']);
 			$url = filter_var($url, FILTER_SANITIZE_URL);
 			$url = explode('/', $url);
 			return $url;
 		}
 	}

 	//Set New Authentication Session
 	protected static function SetSession($sessionName, $value) {
 		if(!isset($_SESSION[$sessionName])) {
 			$_SESSION[$sessionName] = $value;
 			return true;
 		}
 		return false;
 	}

 	//Check If Authentication Session Is Exists
 	protected static function CheckSession($sessionName) {
 		if(isset($_SESSION[$sessionName])) {
 			return true;
 		}
 		return false;
 	}

 	//Function To Return Specific Session Value
 	protected static function GetSession($sessionName) {
 		if(self::CheckSession($sessionName)) {
 			return $_SESSION[$sessionName];
 		}
 		return false;
 	}

 	//Function To Sanitizing And Cleaning The Inputs
 	protected static function FilterInputs($input) {
 		$inptu = strip_tags($input);
 		$input = htmlentities(trim($input));
 		$input = filter_var($input, FILTER_SANITIZE_STRING);
 		$input = stripcslashes($input);
 		return $input;
 	}

 	//Function To Check File Upload Extention
 	protected static function CheckIsAllowed($files, $type) {
 		$AllowExt = [$type];
 		foreach ($files as $file => $value) {
 			foreach ($value['name'] as $key => $val) {
 				$ext = explode('.', $val);
		 		$ext = end($ext);
		 		if(in_array($ext, $AllowExt)) {
		 			return true;
		 		}
		 		return false;
 			}
 			return false;
 		}
 		return false;
 	}


 	//Custom Function To Check File Exists
 	protected static function FileExist($dir, $files) {
 		 foreach ($files as $file => $value) {
 			foreach ($value['name'] as $key => $val) {
				$path = APPROOT . '/' . $dir . '/' . basename($val);
				if(file_exists($path)) {
					return true;
				}
				return false;
			}
			return false;
		}
		return false;
 	}

 	//Redirect Function
 	public static function RedirectTo($direct) {
 		header('location: '. URLROOT . '/' . $direct);
 		exit();
 	}

 	//Function To Reverse Arabic (UTF-8) Character Direction
 	public static function ReverseUTF8($str) {
		if(!preg_match('/^[%0-9.]+$/', $str)) {
	    	preg_match_all('/./us', $str, $ar);
	    	return join('',array_reverse($ar[0]));
		}else {
			return $str;
		}
 	}

 	//Function To Modify The Arabic Text
 	public static function ModArbText($name) {
	    $str = self::ReverseUTF8($name);
		$str = explode(' ', $str);
		foreach ($str as $key => $value) {
			switch ($value) {
				case 'م':
					$str[$key] = 'محمد';
					break;
				case 'ا':
					$str[$key] = 'الله';
					break;
				case 'شعلن':
					$str[$key] = 'شعلان';
					break;
				case 'سلم':
					$str[$key] = 'سلام';
					break;
				case 'المير':
					$str[$key] = 'الامير';
					break;
				case 'بلل':
					$str[$key] = 'بلال';
					break;
				case 'جلل':
					$str[$key] = 'جلال';
					break;
				case 'طلل':
					$str[$key] = 'طلال';
					break;
				case 'علء':
					$str[$key] = 'علاء';
					break;
				case 'هلل':
					$str[$key] = 'هلال';
					break;
				case 'صلح':
					$str[$key] = 'صلاح';
					break;
				case 'فلح':
					$str[$key] = 'فلاح';
					break;
				case 'ولء':
					$str[$key] = 'ولاء';
					break;
				case 'نجلء':
					$str[$key] = 'نجلاء';
					break;
				case 'دلل':
					$str[$key] = 'دلال';
					break;
				case 'الء':
					$str[$key] = 'الاء';
					break;
				case 'اخلص':
					$str[$key] = 'اخلاص';
					break;
				case 'لرا':
					$str[$key] = 'لارا';
					break;
				case 'احلم':
					$str[$key] = 'احلام';
					break;
				case 'حل':
					$str[$key] = 'حلا';
					break;
				case 'اسلم':
					$str[$key] = 'اسلام';
					break;
			}
		}

		$item = array_search('', $str);
		if($item) {
			unset($str[$item]);
		}
		return implode(' ', $str);
	}

 }