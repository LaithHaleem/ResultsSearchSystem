<?php require APPROOT . '/views/inc/header.inc.php'; ?>
<div class="SearchResultsBox">
		<div class="overlay" style="visibility: hidden; background-color: rgba(255, 255, 255, 0.6)">
		<div class='loader' style='border-left-color: #007bff'></div>
		</div>
		<div class="card" id="card-box">
			<div class="container wow pulse" data-wow-delay=".5s">
				<div class="card-header">
					<span>
						<i class="fas fa-bell"></i>
						نظام البحث عن النتائج
					</span>
				</div>
				<div class="card-body">
					<span class="note-title">
						<i class="fas fa-exclamation-circle"></i>
						قم بادخال اسمك الرباعي او رقمك الامتحاني واختر فرعك ومدرستك
					</span>
					<div class="SearchForm">
						<input type="hidden" name="acctoken" value="<?php echo $data['hash']; ?>">
						<div class="form-row">
							<div class="form-group col-md-4">
							<input type="text" name="stnumber" id="stnumber" class="form-input" placeholder="اسمك الرباعي او رقمك الامتحاني" autofocus>
							</div>
							<div class="form-group col-md-3">
							<select class="form-select" id="lertype" name="lertype">
								<option value="def" selected>الفرع الدراسي</option>
								<option value="bio">الاحيائي</option>
								<option value="app">التطبيقي</option>
								<option value="lit">الادبي</option>
							</select>
							</div>
							<div class="form-group col-md-4">
							<select class="form-select" id="sclist" style="display: none" name="scenname"></select>
							</div>
							<div class="form-group col-md-2">
								<button class="SearchBtn offset-md-4" id="SearchBtn"><i class="fas fa-search"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
<?php require APPROOT . '/views/inc/footer.inc.php'; ?>