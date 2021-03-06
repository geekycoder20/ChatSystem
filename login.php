<div class="container mt-5 pt-5">
  <div class="card mx-auto border-0">
    <div class="card-header border-bottom-0 bg-transparent">
        <h2 class="text-center">Chat System</h2>
      <ul class="nav nav-tabs justify-content-center pt-4" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active text-primary" id="pills-login-tab" data-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login"
             aria-selected="true">Login</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-primary" id="pills-register-tab" data-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register"
             aria-selected="false">Register</a>
        </li>
      </ul>
    </div>

    <div class="card-body pb-4">
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
          <form id="login_form" method="post">
            <div class="form-group">
              <input type="email" name="email" class="form-control" id="email" placeholder="Email" required autofocus>
            </div>

            <div class="form-group">
              <input type="password" name="password" class="form-control" id="password" id="password" placeholder="Password" required>
            </div>

            <!-- <div class="custom-control custom-checkbox">
              <input class="custom-control-input" id="customCheck1" checked="" type="checkbox">
              <label class="custom-control-label" for="customCheck1">Check me out</label>
            </div> -->

            <div id="result_login_user">
                
            </div>

            <div class="text-center pt-4">
              <button type="submit" class="btn btn-primary" id="login_btn">Login</button>
            </div>

            <div class="text-center pt-3">
              <a class="btn btn-link text-primary" href="#">Forgot Your Password?</a>
            </div>
          </form>
        </div>

        <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="pills-register-tab">
          <form method="post" id="reg_form">
            <div class="form-group">
              <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Full Name" required autofocus>
            </div>

            <div class="form-group">
              <input type="email" name="reg_email" id="reg_email" class="form-control" placeholder="Email" required>
            </div>

            <div class="form-group">
              <input type="password" name="reg_pwd" id="reg_pwd" class="form-control" placeholder="Set a password" required>
            </div>

            <div class="form-group">
              <input type="password" name="pwd_confirm" id="pwd_confirm" class="form-control" placeholder="Confirm password" required>
            </div>

            <div class="text-center pt-2 pb-1">
              <button type="submit" class="btn btn-primary" id="reg_btn">Register</button>
            </div>
            <div class="pt-2 pb-1" id="result_reg_user">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<link rel="stylesheet" type="text/css" href="css/login_styles.css">