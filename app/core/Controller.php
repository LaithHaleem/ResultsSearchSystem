<?php
 
 //Name Space Of Core Main File
 namespace Core;

 /*
 * Controller Class To Controlling All Contrlllers Class And Model/View
 * Controller Does Require Depending On Router
 */

 class Controller extends Helpers {

 	//Model Function To Handel Models Classes
 	public function model($dir, $mdl) {
 		if(self::CheckFile('models/' . $dir .'/', $mdl)) {
 			require_once '../app/models/'. $dir .'/' . $mdl . '.php';
 			return new $mdl();
 		}else {
 			die('Error Not Found');
 		}
 	}

 	//View Function To Handel And Require Views Classes
 	public function view($viw, $data = []) {
 		if(self::CheckFile('views', $viw)) {
 			require_once '../app/views/' . $viw . '.php';
 		}
 	}
 }