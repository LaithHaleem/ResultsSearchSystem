<?php

 use Core\Controller as Controller;

  class Home extends Controller {
    public function __construct(){

 		//Make Instance Object Of Admin Model
 		$this->HomeModel = $this->model('home','HomeModel');
        //Set Global Access Token Session On Start Site
        self::SetSession('access_token', self::getHash(200));

    }
    
    public function index($param = null) {

        //Define Default Index Page
        $data = [
            'Page' => [
                'ArbTitle' => 'مرحبا بكم في موقع نتائج غماس',
                'EngTitle' => ''
            ],
            'hash' => self::GetSession('access_token')
        ];

        if($param != null) {
           //Load Error 404 If User Write Any Path
           $data['Page']['ArbTitle'] = 'الصفحة غير موجودة';
    	   $this->view('pages/404', $data);
        }else {
           //Laod Index View If Path Is Clean
           $this->view('pages/index', $data);
        }

    }

    public function schools($token) {
        if($token === (string)self::GetSession('access_token')) {
            header('Content-Type: application/json');
            $school = $this->HomeModel->getAllSchools();
            echo json_encode($school);
        }
    }


    public function result() {

        //Error Handeling Variable
        header('Content-Type: application/json');
        $error = [
            'err_title' => 'خطأ',
            'err_message' => ''
        ];

        //Check If The Get Request Is Exists
        if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {

            //Check If All Posts Fields Esist
            if(isset($_POST['stnumber'], $_POST['lertype'], $_POST['scenname'], $_POST['acctoken']) && !empty($_POST['stnumber']) && !empty($_POST['lertype']) && !empty($_POST['scenname']) && !empty($_POST['acctoken']) && $_POST['scenname'] != 'def')
            {

                //Check If Token Is Exist
                if($_POST['acctoken'] === (string)self::GetSession('access_token')) {

                    //Set Data And Sanitaize Inputs
                    $ReqData = [
                        'search'  => self::FilterInputs($_POST['stnumber']),
                        'lertype'   => self::FilterInputs($_POST['lertype']),
                        'scenname'  => self::FilterInputs($_POST['scenname']),
                    ];

                    //Check If Search Is String Make Must 4 Or More Character
                    if(!preg_match('/[0-9]+$/', $ReqData['search'])) {
                        if(count(explode(' ', $ReqData['search'])) < 4) {
                            $error['err_message'] = 'يرجى كتابة الاسم الرباعي';
                            echo json_encode($error);
                            exit();
                        }elseif(preg_match('/[A_Za-z]+$/', $ReqData['search'])) {
                            $error['err_message'] = 'لا يمكنك كتابة الاسم باللغة الانجليزية';
                            echo json_encode($error);
                            exit();
                        }else{
                            //Define Table Type To Get Data From
                            $tabletype = $ReqData['lertype'];
                            //Get Results From Database If Search Is Numeric
                            $result = $this->HomeModel->getOneResult($tabletype, $ReqData['scenname'], $ReqData['lertype'], $ReqData['search']);
                        }
                    }else {
                        if(strlen($ReqData['search']) !== 12) {
                            $error['err_message'] = 'الرقم الامتحاني يجب ان يكون 12 رقم';
                            echo json_encode($error);
                            exit();
                        }else {
                            //Get Results From Database If Search Is Numeric
                            $result = $this->HomeModel->getOneResult($ReqData['scenname'], $ReqData['lertype'], $ReqData['search']);
                        }
                    }

                    if($result) {
                        //Set Data Which Insert Into View
                        $data = [
                        	'search'    => $ReqData['search'],
                            'sequence'  => $result->id,
                            'st_number' => $result->stnumber,
                            'lertype'   => $result->lertype,
                            'school'    => $result->scenname,
                            'st_name'   => $result->stname,
                            'islamic'   => self::ReverseUTF8($result->islamic),
                            'arabic'    => self::ReverseUTF8($result->arabic),
                            'english'   => self::ReverseUTF8($result->english),
                            'bioeco'    => self::ReverseUTF8($result->bioecohis),
                            'math'      => self::ReverseUTF8($result->math),
                            'chemgeo'   => self::ReverseUTF8($result->chemgeo),
                            'physeco'   => self::ReverseUTF8($result->physeco),
                            'result'    => self::ReverseUTF8($result->result),
                            'total'     => $result->total,
                            'average'   => self::ReverseUTF8($result->avareg)
                        ];

                        $this->view('pages/result', $data);
                    }else {
                        $error['err_message'] = 'لا توجد نتيجة بالمعلومات التي ادخلتها يرجى التاكد';
                        echo json_encode($error);
                        exit();
                    }

                }else {
                    $error['err_message'] = 'لا تلعب بالكونسول ';
                    echo json_encode($error);
                    exit();
                }

            }else {
                $error['err_message'] = 'جميع الحقول مطلوبة يرجى اعادة المحاولة';
                echo json_encode($error);
                exit();
            }

        }else {
            $error['err_message'] = 'هناك خطأ في الارسال يرجى المحاولة مجددا';
            echo json_encode($error);
            exit();
        }
    }
}