<?php

 use Core\Controller as Controller;

 class Downloads extends Controller {

    //Define Model Handler Variable
    protected $DownloadsModel;

 	public function __construct() {
        //Make Instance Object Of Admin Model
        $this->DownloadsModel = $this->model('downloads','DownloadsModel');
 	}

 	public function index($lertype = null, $fileId = null) {
        //Define Dependincing Variables
        $data = [
            'Page' => [
                'ArbTitle' => 'مركز تحميل نتائج السادس الاعدادي | ناحية غماس',
                'EngTitle' => 'downloads',
            ],
            'HeaderTop' => [
            	'selected' => null,
            	'lertype' => [
            		'app' => 'نتائج الفرع التطبيقي',
            		'bio' => 'نتائج الفرع الاحيائي',
            		'lit' => 'نتائج الفرع الادبي',
            		'voc' => 'نتائج الفرع المهني'
            	]
            ],
            'Files' => [],
        ];
 
        //Check If User Select Any Lertype Component
        if($lertype != null && $lertype != '') {
        	if(in_array($lertype, array_keys($data['HeaderTop']['lertype']))) {
                //Pass Lertypp Arabic Name Inside Selected Key
                $data['HeaderTop']['selected']  = $data['HeaderTop']['lertype'][$lertype];
                $data['Page']['ArbTitle'] = $data['HeaderTop']['lertype'][$lertype];
                $data['Files'] = $this->DownloadsModel->getPdfSchools($lertype);
                //Load View Top Header Part
                $this->view('downloads/TopHeader', $data);
                //Get And Load View Schools Results To Download
                if($fileId != null && $fileId != '') {
                    foreach($data['Files'] as $school) {
                        $this->DownloadsModel->downloadFile($fileId);
                    }
                    $this->view('downloads/share', $data);
                }else {
                    $this->view('downloads/share', $data);
                } 
            }else {
                //Load Error 404 Page
                $data['Page']['ArbTitle'] = 'الصفحة غير موجودة';
                $this->view('pages/404', $data);
            }
        }else {
        	//Load View Top Header Part
        	$this->view('downloads/topheader', $data);
        	//Load Index Page
        	$this->view('downloads/index', $data);
        }

 	}

}