<?php

 use Core\Controller as Controller;

 class Admin extends Controller {

    //Define Model Handler Variable
    protected $AdminModel;

 	public function __construct() {
 		//Make Instance Object Of Admin Model
 		$this->AdminModel = $this->model('admin','AdminModel');
 	}

 	public function index() {

 		//Redirect And Prevent Access To Login Page If Session Is Exists
 		if(self::CheckSession('user_auth')) {
 			self::RedirectTo('admin/upload');
 		}

 		if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

 			//Define Date That Including Within View Component
 			$data = [
 				'username' => self::FilterInputs($_POST['username']),
 				'password' => trim($_POST['password']),
 				'auth_err' => '',
 				'Page' => ['ArbTitle' => 'تسجيل الدخول']
 			];

 			//Check Input If Empty
 			if(empty($_POST['username']) || empty($_POST['password'])) {
 				$data['auth_err'] = 'جميع الحقولة مطلوبة';
 				$this->view('cp/Admin', $data);
 			}

 			//If The Error Is Empty
 			if(empty($data['auth_err'])) {

 				//Login Function To Check Auth Input With Database
 				$login = $this->AdminModel->loginUser($data['username']);

 				//Chechk If The Login Function Is True
 				if($login) {

 					//Set Token To Get More Secure
 					$log_token = 'N3XzvuoeS0+9v0a18ckyYkCI3E+PPIi5kl8UGg== T+=';

 					//Check If Username Inputs = Database Username That Fetched
	 				if($login->username == $data['username'] && password_verify($data['password'], $login->password) && $login->token == $log_token) {

	 					//Decrypt Password And Equality With Databse Password
 						if(password_verify($data['password'], $login->password)) {
 							
 							//Set Session If There Not Error
 							if(self::SetSession('user_auth', $login->username)) {

 								//Redirect To Upload Page
 								self::RedirectTo('admin/upload');
 							}
 						} else {
							$data['auth_err'] = 'اسم المستخدم او كلمة المرور غير صحيحة';
 							$this->view('cp/Admin', $data);
 						}

 					} else {
 						$data['auth_err'] = 'اسم المستخدم او كلمة المرور غير صحيحة';
 						$this->view('cp/Admin', $data);
 					}
 				} else {
					$data['auth_err'] = 'اسم المستخدم او كلمة المرور غير صحيحة';
					$this->view('cp/Admin', $data);
 				}
 			}


 		} else {

 			//Define Date That Including Within View Component
 			$data = [
 				'username' => '',
 				'password' => '',
 				'auth_err' => '',
 				'Page' => [
 							'EngTitle' => 'Admin Login',
 							'ArbTitle' => 'تسجيل الدخول'
 						  ],
 			];

 			$this->view('cp/Admin', $data);
 		}

     }

    //Start Of Upload Page
 	public function Upload($uptype = null) {

 		//Check If Session Authenecation Is Exists
 		if(!self::CheckSession('user_auth')) {
			//Redirect To Login Page
			self::RedirectTo('Admin');
 		}

 		//Define Default Data Which Will Be In View
		$data = [
			'Page' => ['ArbTitle' => 'رفع ملف جديد'],
			'IsXls' => true,
			'up_message' => '',
			'up_status' => null
		];

 		//Check Upload Type Path
 		if($uptype == '') {

	 		//Check If Post Request Is Exists
	 		if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

	 				//Define Request Variables Content
	 				$ReqData = [
	 					'post' => [
	 						'lertype'  => self::FilterInputs($_POST['lertype']),
	 						'uptype'  => self::FilterInputs($_POST['uptype'])
	 					]
	 				];

	 				//Check If File Request Exist
		 			if(isset($_FILES['xlsfile']) && !empty($_FILES['xlsfile'])) {
		 				//Check If File Selected Type Is Allow
		 				if(self::CheckIsAllowed($_FILES, 'xlsx')) {
		 					//fffff
		 					if($ReqData['post']['uptype'] == 'xlsx') {
			 					//Check If File Exsist On Server
			 					if(!self::FileExist('uploads/' . $ReqData['post']['lertype'], $_FILES)) {
			 						//Start Uploading File On Server
			 						if($this->AdminModel->UploadFile('uploads/' . $ReqData['post']['lertype'], $_FILES['xlsfile'])) 
			 						{

			 							foreach ($_FILES['xlsfile']['name'] as $school) {
			 								//Some Variables
			 								$extfile = explode('.', $school)[1];
			 								$hashname = self::getHash(255);
			 								$schoolname = explode('.', $school)[0]; 
			 								$tabletype = $ReqData['post']['lertype'];
			 								//Get SpreadSheet Reader
			 								$SpreadSheet = $this->AdminModel->SpreadSheet($ReqData['post']['lertype'] . '/' . $school);

			 								foreach ($SpreadSheet as $Row) {
			 									//More Modify Name To Get Best Result
			 									$StName = self::ModArbText(self::ModArbText(self::ModArbText($Row[11])));
			 									//Check If Student Id Is Numeric
			 									if(preg_match('/[0-9]+$/', $Row[13])) {
			 										//Check If Upload School Is Done
			 										if($this->AdminModel->UploadSchool($tabletype, $Row[13], $Row[12], $StName, $Row[10], $Row[9], $Row[8], $Row[7], $Row[6], $Row[5], $Row[4], $Row[2], $Row[1], $Row[0], $schoolname, $ReqData['post']['lertype'], $hashname))
			 										{
			 											//Send Success Response
							 							$data['up_status'] = 1;
							 							$data['up_message'] = 'تم الرفع بنجاح';
							 							$this->view('cp/Upload', $data);
			 										}
			 									}
			 								}

			 								//Check If Files Type Is xlsx Insert School Hashed Name
			 								//In Files Database
			 								$extfile == 'xlsx' ? 
			 									$this->AdminModel->InsertSchool($schoolname, $hashname, $ReqData['post']['lertype'], 'uploads') : ture;

			 							}
			 						}else {
			 							//Error Pass File Exist
			 							$data['up_status'] = 0;
			 							$data['up_message'] = 'لم يتم الرفع هناك بعض الاخطاء';
			 							$this->view('cp/Upload', $data);
			 						}

			 					}else {
			 						//Error Pass File Exist
			 						$data['up_status'] = 0;
			 						$data['up_message'] = 'ملف او اكثر موجود مسبقا';
			 						$this->view('cp/Upload', $data);
			 					}

		 					}else {
		 						//Error Pass Not Excel
		 						$data['up_status'] = 0;
		 						$data['up_message'] = 'الملف الذي اخترته ليس اكسب';
		 						$this->view('cp/Upload', $data);
		 					}

		 				}elseif(self::CheckIsAllowed($_FILES, 'pdf')) {
		 					//Error Pass Files Not Xlsx
							if($ReqData['post']['uptype'] == 'pdf') {

			 					//Check If File Exsist On Server
			 					if($this->AdminModel->CheckPdfExist($ReqData['post']['lertype'], $_FILES)) {
			 						//Start Uploading File On Server
			 						if($this->AdminModel->UploadFile('downloads/' . $ReqData['post']['lertype'], $_FILES['xlsfile'])) 
			 						{
			 							//Uploaded Successfully
			 							$data['up_status'] = 1;
			 							$data['up_message'] = 'تم الرفع بنجاح';
			 							$this->view('cp/Upload', $data);
			 						}else {
			 							//Error Pass File Exist
			 							$data['up_status'] = 0;
			 							$data['up_message'] = 'لم يتم الرفع هناك بعض الاخطاء';
			 							$this->view('cp/Upload', $data);
			 						}

			 					}else {
			 						//Error Pass File Exist
			 						$data['up_status'] = 0;
			 						$data['up_message'] = 'الملفات التي رفعتها موجودة مسبقا';
			 						$this->view('cp/Upload', $data);
			 					}

							}else {
		 						//Error Pass Not PDF
		 						$data['up_status'] = 0;
		 						$data['up_message'] = 'الملف الذي اخترته ليس PDF';
		 						$this->view('cp/Upload', $data);
							} 					
		 				}

		 			}else {
		 				//Error Pass Files Not Selected
		 				$data['up_status'] = 0;
		 				$data['up_message'] = 'لم تقم باختيار اي ملف';
		 				$this->view('cp/Upload', $data);
		 			}

	 		} else {

	 			//Load Xlx Page
	 			$this->view('cp/Upload', $data);
	 		}

	 	}else {
	 		$data['Page']['ArbTitle'] = 'الصفحة غير موجودة';
	 		$this->view('pages/404', $data);
	 	}
 	}
}