<?php require APPROOT . '/views/inc/header.inc.php'; ?>

<div class="alert alert-danger" style="<?php echo ($data['up_status'] === 0) ? 'display: block' : 'display: none'; ?>">
  <?php echo $data['up_message']; ?>
    <i class="fas fa-times close-alert"></i>
  </div>
<div class="alert alert-success" style="<?php echo ($data['up_status'] === 1) ? 'display: block' : 'display: none'; ?>">
  <i class="fas fa-times close-alert"></i>
  <?php echo $data['up_message']; ?>
  </div>
<div class="UploadForm">
  <div class="container">
    <div class="card">
      <div class="card-header">
        <i class="fas fa-cloud-upload-alt"></i>
        <?php echo $data['Page']['ArbTitle']; ?>
      </div>
      <div class="card-body">
        <form id="uploerfile" action="" method="POST" enctype='multipart/form-data'>
         <div class="form-row file-info-group">
            <div class="from-group col order-md-2">
              <select class="form-control lertype" name="uptype" id="uptype">
                <option value="def" slected>نوع الملف</option>
                <option value="xlsx">Excel</option>
                <option value="pdf">PDF</option>
              </select>
            </div>
            <div class="from-group col order-md-1">
              <select class="form-control lertype" name="lertype">
                <option value="def" slected>الفرع الدراسي</option>
                <option value="bio">الاحيائي</option>
                <option value="app">التطبيقي</option>
                <option value="lit">الادبي</option>
              </select>
            </div>
          </div>
          <div class="custom-file">
            <input type="file" name="xlsfile[]" class="custom-file-input" id="fileinput" multiple>
            <label class="custom-file-label" id="filelabel" for="fileinput">
            <span class="labelText" id="labelText">اختر ملف من جهازك</span>
            <span class="fileTypeIcon"><i class="fas "></i></span>
            </label>
          </div>
          <div class="uplaodBtnBox">
            <button type="submit" name="uploadBtn" class="btn btn-danger">رفع الملف</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.inc.php'; ?>