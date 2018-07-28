<?php require APPROOT . '/views/inc/header.inc.php'; ?>
<div class="loginForm col-md-4 col-sm-12">
  <div class="container">
    <div class="card">
      <div class="card-body">
      <div class="card-header loginTitle">
        <i class="fas fa-sign-in-alt"></i>
        <?php echo $data['Page']['ArbTitle']; ?>
      </div>
    <div class="alert alert-danger" style="<?php echo (empty($data['auth_err'])) ? 'display: none' : ''; ?>">
      <i class="fas fa-times close-alert"></i>
      <?php echo $data['auth_err']; ?>
    </div>
    <form class="form-signin" action="<?php echo URLROOT ?>/admin" method="POST">
    <label for="inputUsername" class="sr-only">Admin Username</label>
    <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" value="<?php echo $data['username']; ?>" >
    <label for="inputPassword" class="sr-only">Admin Password</label>
    <input type="password" id="inputPassword" name="password" class="form-control mt-2" placeholder="Password" value="<?php echo $data['password']; ?>">
      <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">
         دخول
    </button>
    </form>
  </div>
</div>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.inc.php'; ?>