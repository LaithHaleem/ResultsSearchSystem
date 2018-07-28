<?php

 use Core\Database as Database;
 use Core\Helpers as Helpers;

 class AdminModel {

 	//Define Databse Handeler
 	private $DBhModel;
 	private $HelpersModel;

 	public function __construct() {
 		//Get Instance From Database Class
 		$this->DBhModel = new Database;
 		//Get Instance From Helpers Class
 		$this->HelpersModel = new Helpers;
 	}

 	//Function Return SpreadSheet Object
 	public function SpreadSheet($fileName) {
 		return $this->SpSheet = new SpreadsheetReader(APPROOT . '/uploads/' . $fileName);
 	}

 	public function loginUser($username) {
 		$this->DBhModel->query('SELECT username, password, token FROM users WHERE username = :username');
 		$this->DBhModel->bindAuthParam('username', $username);
 		return $this->DBhModel->getResults();
 	}

 	//Function To Insert File Schools Details In Database
 	public function InsertSchool($realname, $hashname = null, $lertype, $dirtype) {
 		$this->DBhModel->query("INSERT INTO files (realname, hashname, lertype, dirtype) VALUES (:realname, :hashname, :lertype, :dirtype)");
 		$this->DBhModel->bindAuthParam('realname', $realname);
 		$this->DBhModel->bindAuthParam('hashname', $hashname);
 		$this->DBhModel->bindAuthParam('lertype', $lertype);
 		$this->DBhModel->bindAuthParam('dirtype', $dirtype);
 		if($this->DBhModel->rowCount()) {
 			return true;
 		}
 		return false;
 	}

 	//Custom Uploader Function To Upload File Depending On Type
 	public function UploadFile($dir, $files) {
 		for($i=0;$i<count($files['name']);$i++) {
 			//Define Some Variables
 			$path;
 			$ExtFile = explode('.', $files['name'][$i])[1];
 			$hashname = $this->HelpersModel->getHash(500);
 			//Check If File Type == PDF OR Excel To Save On Server With Hashname
 			$path = ($ExtFile == 'pdf') ?
 					APPROOT . '/' . $dir . '/' . $hashname . '.' . $ExtFile :
 					APPROOT . '/' . $dir . '/' . $files['name'][$i];
 			//Upload File On Server Directory
 			move_uploaded_file($files['tmp_name'][$i], $path);
 			//Insert File Details On Databse After Uploaded It
 			if($ExtFile == 'pdf') {
 				$this->InsertSchool(explode('.', $files['name'][$i])[0], $hashname, explode('/', $dir)[1], explode('/', $dir)[0]);
 			}
 		}
 		return true;
 	}

 	//Function To Upload Excel Details To Database To Init it To Search
 	public function UploadSchool($table, $id, $stnumber, $name, $islamic, $arabic, $english, $bioecohis, $math, $chemgeo, $physeco, $result, $total, $avareg, $scenname, $lertype, $hashname) {
 		//Start Query Function To Insert School Sheet
 		$this->DBhModel->query("INSERT INTO `{$table}`(`id`, `stnumber`, `stname`, `islamic`, `arabic`, `english`, `bioecohis`, `math`, `chemgeo`, `physeco`, `result`, `total`, `avareg`, `scenname`, `lertype`, `hashname`) VALUES (:id, :stnumber, :stname, :islamic, :arabic, :english, :bioecohis, :math, :chemgeo, :physeco, :result, :total, :avareg, :scenname, :lertype, :hashname)");
 		//Set Bind Params Value To Query
 		$this->DBhModel->bindAuthParam('id', $id);
 		$this->DBhModel->bindAuthParam('stnumber', $stnumber);
 		$this->DBhModel->bindAuthParam('stname', $name);
 		$this->DBhModel->bindAuthParam('islamic', $islamic);
 		$this->DBhModel->bindAuthParam('arabic', $arabic);
 		$this->DBhModel->bindAuthParam('english', $english);
 		$this->DBhModel->bindAuthParam('bioecohis', $bioecohis);
 		$this->DBhModel->bindAuthParam('math', $math);
 		$this->DBhModel->bindAuthParam('chemgeo', $chemgeo);
 		$this->DBhModel->bindAuthParam('physeco', $physeco);
 		$this->DBhModel->bindAuthParam('result', $result);
 		$this->DBhModel->bindAuthParam('total', $total);
 		$this->DBhModel->bindAuthParam('avareg', $avareg);
 		$this->DBhModel->bindAuthParam('scenname', $scenname);
 		$this->DBhModel->bindAuthParam('lertype', $lertype);
 		$this->DBhModel->bindAuthParam('hashname', $hashname);
 		//Check If Inserting Function Is Done
 		if($this->DBhModel->rowCount()) {
 			return true;
 		}
 		return false;
 	}

 	//Function To Check PDF File If Exists On Database And Server
 	//Custom Function To Check File Exists
 	public function CheckPdfExist($lertype, $files) {
 		 foreach ($files as $file => $value) {
 			foreach ($value['name'] as $key => $val) {
 				//Set File Name Without Extension
 				$WithoutExt = explode('.', $val)[0];
 				//Start Query Function To Get PDF File Name On Database
				$this->DBhModel->query('SELECT * FROM files WHERE realname = :realname && lertype = :lertype && dirtype = :dirtype');
 				//Set Bind Params Value To Query
				$this->DBhModel->bindAuthParam('lertype', $lertype);
				$this->DBhModel->bindAuthParam('realname', $WithoutExt);
				$this->DBhModel->bindAuthParam('dirtype', 'downloads');
				//Check If Current File Not Exist On Database To Upload
				if(!$this->DBhModel->rowCount()) {
					return true;
				}
				return false;
			}
			return false;
		}
		return false;
 	}

 }