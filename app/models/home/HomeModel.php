<?php

 use Core\Database as Database;
 use Core\Helpers as Helpers;
 
 class HomeModel {

 	//Define Databse Handeler
 	private $DBhModel;
 	//Define SpreadSheet Library Handeler
 	private $SpSheet;

 	public function __construct() {
 		//Get Instance From Database Class
 		$this->DBhModel = new Database;
 		//Get Instance From Helpers Class
 		$this->HelpersModel = new Helpers;

 	}

 	//Function To Get All Schools
 	public function getAllSchools() {
 		$this->DBhModel->query('SELECT `realname`, `lertype`, `hashname` FROM files WHERE dirtype = :dirtype');
 		$this->DBhModel->bindAuthParam('dirtype', 'uploads');
 		return $this->DBhModel->getAllResults();
 	}

 	 	//Function To Get All Schools
 	public function getOneSchool($lertype, $scenname, $dirtype = 'uploads') {
 		$this->DBhModel->query('SELECT * FROM schools WHERE ler_type = :lertype && scen_name = :scenname && dir_type = :dirtype');
 		$this->DBhModel->bindAuthParam('lertype', $lertype);
 		$this->DBhModel->bindAuthParam('scenname', $scenname);
 		$this->DBhModel->bindAuthParam('dirtype', $dirtype);
 		return $this->DBhModel->getResults();
 	}

 	///Function To Get One Results Depending On User Search
 	public function getOneResult($table, $hashname, $lertype, $search) {
 		$this->DBhModel->query("SELECT * FROM `{$table}` WHERE hashname = :hashname && lertype = :lertype && stname LIKE '%{$search}%' OR stnumber LIKE '%{$search}%' LIMIT 1");
 		$this->DBhModel->bindAuthParam('hashname', $hashname);
 		$this->DBhModel->bindAuthParam('lertype', $lertype);
 		return $this->DBhModel->getResults();
 	}

 	//Function to Return SpreadSheet Libarary As Class
 	//File Parameter To Pass Specific Shcool Name To Read It Xls File
 	public function SpreadSheet($lertype, $fileName) {
 		return $this->SpSheet = new SpreadsheetReader(APPROOT . '/uploads/'. $lertype . '/' . $fileName . '.xlsx');
 	}

 }