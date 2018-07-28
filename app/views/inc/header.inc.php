<!DOCTYPE html>
<html>
<head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title><?php echo $data['Page']['ArbTitle']; ?></title>
 	<!-- External Css Libraries And Fonts -->
 	<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
 	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
 	<!-- Internal Css Libraries And Styles -->
 	<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/libs/bootstrap.lib.min.css">
 	<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/libs/fontawesome.lib.min.css">
 	<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/libs/animate.lib.min.css">
 	<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/libs/awesomeloader.lib.min.css">
 	<style>
	   /*
		*	Main Global Css Styles
		*/

		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			text-align: right;
			outline: none !important;
			list-style: none;
			text-decoration: none !important;
			font-family: 'Cairo', sans-serif;
		}


		body {
			background-color: #e2e2e29c;
			direction: rtl !important
		}

		.alert {
			text-align: right;
			border-radius: 0;
			color: #ffffff;
		}

		.alert .close-alert {
		    font-family: 'Font Awesome 5 Free';
		    font-weight: 900;
		    position: absolute;
		    top: 16px;
		    left: 16px;
		    cursor: pointer;
		}

		.alert-danger {
		    background-color: #af0b1a !important;
		    border-color: #af0b1a !important;
		}

		.alert-success {
		    background-color: #078424 !important;
		    border-color: #078424 !important;
		}

		.overlay {
			width: 100%;
			height: 100%;
			background-color: #343a40;
			position: absolute;
			top: 0;
			left: 0;
			display: flex;
			justify-content: center;
			align-items: center;
			z-index: 999;
			visibility: hidden;
		}

		.la-ball-grid-beat {
			width: 45px;
			height: 45px
		}


		.la-ball-grid-beat > div {
			width: 11px;
			height: 11px
		}

		.card {
			border: none !important
		}

		.card-body {
			background: #fff !important
		}

		/*
		* Start Admin Part Styles
		*/

		.loginForm{
			margin: 120px auto 0;

		}

		.loginForm .card {
			height: auto;
			box-shadow: 1px 1px 25px rgba(165, 165, 165, 0.7)
		}

		.loginForm .loginTitle {
			margin-bottom: 15px;
		    border-bottom: none;
		    border: 1px solid rgba(0, 0, 0, 0.1);
		    border-radius: 3px;
		    text-align: right;
		}

		.UploadForm {
			width: 60%;
			margin: 120px auto 0;
			box-shadow: 1px 1px 25px rgba(165, 165, 165, 0.7);
			border-radius: 5px
		}

		.UploadForm input,
		.UploadForm select{
			direction: rtl;
		}

		.UploadForm .container{
			padding-right: 0;
			padding-left: 0;
		}

		.UploadForm .card-header {
			text-align: right !important
		}

		.UploadForm .card-body {
			padding: 50px;
		}

		.UploadForm .custom-file-input {cursor: pointer}

		.UploadForm .custom-file-label {text-align: left}

		.UploadForm .custom-file-label:after {
			background-color: #007bff;
			color: #fff;
			border: 1px solid #007bff;
		}

		.UploadForm .lertype {
			padding: 0 .375rem !important
		}

		.UploadForm .uplaodBtnBox {
			margin: 10px 0;
			text-align: left;
		}

		.UploadForm .file-info-group {
			margin-bottom: 10px;
		}

		.UploadForm .fileTypeIcon {
		    display: none;
		    margin-right: 10px;
		    font-size: 17px;
		}
		/*
		* End Admin Part Styles
		*/


		/*
		* Start Home Styles
		*/

		.navbar-brand {
			font-size: 22px
		}

		.navBox {
			text-align: right;
		}

		.navBox li {
			padding: 5px;
			font-size: 15px;
		}

		.navBox li.active {
			background: #007bff;
			border-radius: 4px
		}

		.navBox li a {
			color: #fff !important
		}

		.SearchResultsBox {
			width: 60%;
		    margin: 120px auto 0;
		    box-shadow: 1px 1px 25px rgba(165, 165, 165, 0.7);
		    border-radius: 5px;
		    position: relative;
		    transition: height 0.4s ease
		}

		.SearchResultsBox .card {
			margin-bottom: 50px
		}

		.SearchResultsBox .card-header {
			background-color: #007bff;
			color: #fff;
			text-align: right
		}

		.SearchResultsBox .note-title {
			display: block;
			margin-bottom: 10px;
		    text-align: right;
		    font-size: 14px;
		    font-family: tahoma;
		    color: #dc3545;
		    font-weight: bold;
		}

		.SearchResultsBox .note-title > i {
			font-size: 16px
		}

		.SearchResultsBox .container {
			padding-right: 0;
			padding-left: 0
		}

		.SearchResultsBox .SearchForm {
			margin-top: 30px
		}

		.SearchResultsBox .SearchForm .form-input,
		.SearchResultsBox .SearchForm .form-select {
			width: 100%;
		    height: 100%;
		    padding: 8px;
		    border-radius: 2px;
		    color: #272727;
		    border: 1px solid #cccccc;
		    transition: all 0.3s ease
		}

		.SearchResultsBox .SearchForm .form-input:focus {
			border-bottom: 3px solid #007bff
		}

		.SearchResultsBox .SearchForm .form-select:focus {
			border-right: 3px solid #007bff
		}

		.SearchResultsBox .SearchForm .SearchBtn {
			width: 100%;
			height: 100%;
			background-color: #007bff;
			padding: 8px;
			color: #fff;
			text-align: center;
			border: none;
			border-radius: 2px;
			cursor: pointer;
			transition: all 0.4s ease
		}

		.SearchResultsBox .SearchForm .SearchBtn:hover {
			background-color: #0772e4
		}

		.SearchResultsBox .table {
			display: table;
			overflow: hidden;
		}

		.SearchResultsBox .stInfos {
			padding: 0px 0 15px !important;
			text-align: right;
		}

		.SearchResultsBox .stInfos span:not(:first-child) {
			padding-right: 15px
		}

		.SearchResultsBox .table .table-row {
			padding: 10px;
		    width: 100%;
		    display: table-row;
		}

		.SearchResultsBox .table .table-row:hover {
			background: #fbfbfb
		}

		.SearchResultsBox .table .table-header {
			box-shadow: 0px 1px 3px rgba(80, 80, 80, 0.3)
			
		}

		.SearchResultsBox .table .table-row .table-cell {
			width: 10%;
			display: table-cell;
			padding: 10px;
			border-bottom: 1px solid #bfbebe;
			text-align: center;
			font-size: 16px;
			font-weight: bold;
			color: #7d7d7d
		}

		.SearchResultsBox .table .table-row.table-header > div {
			padding: 15px 10px;
			color: #42413f;
			font-size: 15px
		}

		.copyrights {
			display: flex;
		    justify-content: center;
		    align-items: center;
		    padding: 60px 0 50px;
		    color: #585757;
		    font-weight: bold
		}

		.copyrights > .fas {
			color: red
		}

		/*****   Media Query Home Styles   *****/

		@media screen and (max-width: 1260px) {
			.SearchResultsBox {
				width: 90%;
			}

			.SearchResultsBox .card > .container {
				width: 100% !important;
				max-width: 100% !important;
			}
		}

		@media screen and (max-width: 991px) {
		    .navBox {
		    	margin-top: 10px
		    }

		    .navBox li {
		    	padding-right: 10px
		    }
		}

		@media screen and (max-width: 840px) {

			.SearchResultsBox {
				margin: 50px auto 0;
			}

			.SearchResultsBox .stInfos span {
				display: block;
				margin-bottom: 10px;
				padding-right: 0 !important
			}

			.SearchResultsBox .table .table-row {
			    display: inline-block !important;
			    width: 50% !important;
			}

			.SearchResultsBox .table .table-row.table-header {
				box-shadow: none
			}

			.SearchResultsBox .table .table-row .table-cell {
				width: 100% !important;
				display: block !important;
				padding: 14px 10px;
			}

		    .form-group > button {
		    	padding: 10px !important
		    }

		}

		/*
		* End Home Styles
		*/

		/*
		* Start Download Styles
		*/

		.downloads-header {
			padding: 15px 20px;
		    font-size: 16px;
		    font-weight: bold;
		    color: #5d5d5d;
		}

		.downloads-header .cat-path .path-static {
		    text-decoration: none
		}

		.downloads-header .cat-path .path-static i {
		    font-size: 14px
		 }

		.lertype-box {
			padding: 20px;
		}

		.lertype-box .box {
			width: 95%;
			height: 300px;
			text-align: center;
			background: #fff;
			display: flex;
			justify-content: center;
			align-items: center;
			position: relative;
			transition: all .6s ease
		}

		.lertype-box .box .box-container {
			width: 98%;
			height: 98%;
			display: flex;
			justify-content: center;
			align-items: center;
			transition: all .4s ease;
			position: relative;
		}

		.lertype-box .box .box-container:hover {
			box-shadow: 0px 5px 5px -3px 
			rgba(216, 216, 216, 0.2), 0px 8px 10px 1px 
			rgba(84, 84, 84, 0.14), 0px 3px 14px 2px 
			rgba(0, 0, 0, 0.12);
			transform: translateY(-10px);
		}

		.box-container-item i,
		.box-container-item a {
			display: block;
			text-align: center;
			font-size: 95px;
			color: #5d5d5d;
		}

		.box-container-item i {
			color: #007bff
		}

		.box-container-item a {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			text-align: center;
			line-height: 480px;
		    font-size: 26px;
		    text-decoration: none;
		    font-weight: bold;
		}

		.share-downloads {
			padding: 50px 50px;
			background-color: #fff;
			min-height: 32rem
		}

		.share-downloads .card-wrapper > .card {
			transition: all .4s ease;
			position: relative;
		}

		.share-downloads .card-wrapper > .card:hover {
			box-shadow: 0px 5px 5px -3px 
			rgba(216, 216, 216, 0.2), 0px 8px 10px 1px 
			rgba(84, 84, 84, 0.14), 0px 3px 14px 2px 
			rgba(0, 0, 0, 0.12);
			transform: translateY(-10px);
			z-index: 111
		}

		.share-downloads .card-wrapper > .card .card-body {
			text-align: center;
		}

		.card-wrapper > .card .card-img-top {
			width: 60% !important
		}

		.share-downloads .card-wrapper > .card .card-title {
			text-align: center;
			padding: 15px 15px 15px 25px;
			font-size: 18px;
			line-height: 25px;
			color: #343a40;
		}

		@media screen and (max-width: 840px) {
			.downloads-header {
				padding: 15px;
				font-size: 15px;
			}

			.downloads-header .cat-path .path-static i {
				font-size: 13px;
			}

			.downloads-header > .container {
				text-align: center
			}

			.lertype-box {
				padding: 0;
			}

			.lertype-box .box {
				width: 100%
			}
		}


		/*
		* End Download Styles
		*/


		/*
		* Start Error Styles
		*/

		.error-box {
			margin-top: 90px
		}
		.error-box > .container{
		  display: block;
		  text-align: center;
		}

		.error-box > .container .four1, 
		.error-box > .container .zero, 
		.error-box > .container .four2 {
		    display: inline-block;
		}

		.error-box > .container h1{
		  margin-top: 55px;
		  font-size: 32px;
		  text-align: center; 
		  color: #666;
		}

		@media screen and (max-width: 991px) {
			.error-box > .container div svg {
				width: 100px;
			}

			.error-box > .container h1 {
				margin-top: 0px;
				font-size: 33px;
			}
		}


		@media screen and (max-width: 840px) {
			.error-box > .container div svg {
				width: 80px;
			}

			.error-box > .container h1 {
				margin-top: 0px;
				font-size: 23px;
			}
		}

		/*
		* End Error Styles
		*/
 	</style>
 	<script>
		/*
		* Main Js Script Application	
		* Contain All Of Functionality Of Application
		* Contain Three Parts Helpers Functions, Execute Function And Init Functions 
		*/

		/***************************************************/
		/******** Helpers Function Dependencing ***********/
		/*************************************************/

		////// Function To Make Proccess On LocalStorage
		function Storage() {
			this.Set = function(item, value) {
				return localStorage.setItem(item, JSON.stringify(value));
			}
			this.Get = function(item) {
				return JSON.parse(localStorage.getItem(item));		
			}
			this.Remove = function(item) {
				localStorage.removeItem(item);
				return;
			}
			return this;
		}

		////// Function To Make Proccess On Overlay Loader
		function Loader() {
			this.Show = function(selector) {
				$(selector).css({'visibility': 'visible'}).show();
			}
			this.Hide = function(selector) {
				$(selector).fadeOut(500).hide();
			}
			return this;
		}

		/**********************************************/
		/********* Main Application Functions ********/
		/********************************************/

		$(document).ready(function() {

			//Hide Overlay Loader After Window Complete Loading
			Loader().Hide('body > .overlay');


			//Dynamic Root Url
			var rooturl = location.href;

			//Storing Schools Data As LocalStroage To Make More Speed
			var SchoolsStorage = Storage().Get('schools');

			//Access Token Handeler To Pass With Get Schools
			var acctoken = $('[name="acctoken"]').val();

			//Get Schools Data To Store It
			axios.get(rooturl+'Home/schools/'+acctoken)
			.then(function(response){
				//Loop The Schools Response
				Storage().Set('schools', response.data);
			});

			//Init External Plugins
			new WOW().init();

			//Set File Input Value Override Label Output
			$('#uptype').on('change', function() {
				//catch vars
				var fileTypeIcon = $('.fileTypeIcon');
				//Get Type Of File
				var fileType = $(this).val();
				var AllowFilesType = ['xlsx', 'pdf']
				//Check If Selected File Type Is Allowed
				if(fileType == 'pdf') {
						fileTypeIcon.show().children('.fas')
						.addClass('fa-file-pdf').css({'color': '#dc3545'});
				}else if(fileType == 'xlsx') {
						fileTypeIcon.show().children('.fas')
						.addClass('fa-file-excel').css({'color': '#28a745'});
				}else {
					fileType.hide();
				}
			});

			//Put File Selected Path On Label Value
			$('#fileinput').on('change', function() {$('#labelText').text($(this).val())})

			//Loading Option Output On Change Lertype Select
			$('#lertype').on('change', function() {
				var sclist = $('#sclist');
				var $this = $(this);
				//Set Option Html Output From  SCHOOLS Constant Storage
				var html = '<option value="def" selected>المدرسة</option>';
					//Check If LocalStroage Not Handel Storage
					SchoolsStorage == null || SchoolsStorage == undefined ? 
						SchoolsStorage = Storage().Get('schools') : true;
					//Loop The Schools Response
					$.each(SchoolsStorage, function(inx, val){
						if($this.val() == val.lertype) {
							html += '<option value="'+ val.hashname +'">'+ val.realname
							+'</option>';
						}
					});
					//Check If Select List Empty To Append School Data
					sclist.html == '' ? sclist.append(html) : sclist.html('').append(html);
				
				//Check If School List Value == def Hide It Else That Show
				$this.val() == 'def' ? sclist.hide() : sclist.show();
				Storage().Remove('schools');
			});


			//Make Results Request And Get Data
			$('#SearchBtn').on('click', function() {

				//Call Loader On Submit Before Request Starting
				Loader().Show('.SearchResultsBox > .overlay');
				
				//Init Form Data To Pass Inside Request
				var FData = new FormData();
				FData.set('acctoken', $('[name="acctoken"]').val())
				FData.set('stnumber', $('[name="stnumber"]').val())
				FData.set('lertype',  $('[name="lertype"]').val())
				FData.set('scenname', $('[name="scenname"]').val())

				//Start Request And Response Data
				axios.post(rooturl+'Home/result', FData)
				.then(function(response) {
					console.log(response.data);
					//Check If Data Response Bigest Than Zero
					if(response.data.length === 0) {
						swal('خطا', 'الرقم الامتحاني غير صحيح اوغير موجود', 'error');
					}else if(typeof response.data == 'object') {
						swal(response.data.err_title, response.data.err_message, 'error');
					}else {
						$('#card-box').html(response.data);
					}
					//Hide Loader After Request Ending
					Loader().Hide('.SearchResultsBox > .overlay');
				})
			});

		});
 	</script>
</head>
<body>
<?php require APPROOT . '/views/inc/navbar.inc.php'; ?>