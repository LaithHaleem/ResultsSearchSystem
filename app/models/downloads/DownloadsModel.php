<?php

 use Core\Database as Database;
 use Core\Helpers as Helpers;

 class DownloadsModel {

 	//Define Databse Handeler
 	private $DBhModel;
 	private $HelpersModel;

 	public function __construct() {
 		//Get Instance From Database Class
 		$this->DBhModel = new Database;
 		//Get Instance From Helpers Class
 		$this->HelpersModel = new Helpers;
 	}

 	//Get Pdf School From Files Table
 	public function getPdfSchools($lertype) {
 		$this->DBhModel->query('SELECT * FROM files WHERE lertype = :lertype && dirtype = "downloads"');
 		$this->DBhModel->bindAuthParam('lertype', $lertype);
 		return $this->DBhModel->getAllResults();
 	}

 	//Donwload Pdf File Depending On File Hash Id
 	public function downloadFile($fielId) {
 		$this->DBhModel->query('SELECT * FROM files WHERE hashname = :hashname && dirtype = "downloads"');
 		//Set Bind Param Value To Query Statment
 		$this->DBhModel->bindAuthParam('hashname', $fielId);
 		//Check If Files Hash Name Is Exists
 		if($this->DBhModel->rowCount()) {
 			//Get Pdf File Depending Hash Name
 			$pdfFile = $this->DBhModel->getResults();
 			//Define File Path On Server Downloads Directory
 			$filepath = APPROOT . '/downloads/' . $pdfFile->lertype . '/' . $pdfFile->hashname . '.pdf';
 			//Check If File Is Exist On Server Donwload Directory
 			if(file_exists($filepath)) {
 				//Init File to Make Reading Before Download Start
				$fp = fopen($filepath, "r") ;
				//Make Cusome Donwload Name To Change Hash File Name
				$downName = $pdfFile->realname . '.pdf';
				//Set Server Headers To Define Download Function
				header("Cache-Control: maxage=1");
				header("Pragma: public");
				header("Content-type: application/pdf");
				header("Content-Transfer-Encoding: binary");
				header('Content-Length:' . filesize($filepath));
				header("Content-Disposition: inline; filename=".$downName."");
				//Clear Ob Buffer After Download
				ob_clean();
				flush();
				while (!feof($fp)) {
				   $buff = fread($fp, 1024);
				   print $buff;
				}
				exit;
			}
 		}
 	}

/*



*/



 }