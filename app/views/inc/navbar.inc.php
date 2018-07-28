<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
      <a class="navbar-brand" href="<?php echo URLROOT; ?>">نتائج غماس</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainTopNavbar" aria-controls="mainTopNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse navBox" id="mainTopNavbar">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?php echo ($data['Page']['EngTitle'] == '') ? 'active' : ''; ?>">
          <a class="nav-link" href="<?php echo URLROOT; ?>">
            <i class="fas fa-book"></i>
            السادس 
          </a>
        </li>
        <li class="nav-item <?php echo ($data['Page']['EngTitle'] == 'downloads') ? 'active' : ''; ?>">
          <a class="nav-link" href="<?php echo URLROOT; ?>/downloads">
             <i class="fas fa-cloud-download-alt"></i>
            مركز التحميل 
          </a>
        </li>
       <li class="nav-item <?php echo ($data['Page']['EngTitle'] == 'contact') ? 'active' : ''; ?>">
          <a class="nav-link" href="https://www.facebook.com/LaithHalem" target="_balnk">
            <i class="fas fa-phone"></i>
            اتصل بنا
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="overlay" style="visibility: visible">
  <div class="loader" style="border-left-color: #fff"></div>
</div>