<?php
  session_start();
  $error=NULL;
  if(isset($_POST['role']))
  {
    require_once('connection.php');
    $db = DB::getInstance();
    $role = $_POST['role'];
    $email = $_POST['email'];
    $password = $_POST['password'];
      switch ($role)
      {
      case 'Administrator':
        $req = $db->prepare("SELECT Email, Password FROM gu_admin WHERE Email = :email;");
        $req->bindValue(':email',$email);
        $req->execute();
        $user = $req->fetch();
        if (!isset($user['Email']))
        {
          $error = "Invalid Email";
          break;
        }
        if ($password != $user['Password'])
        {
          $error = "Invalid Password";
          break;
        }
        break;
      case 'Staff':
        $req = $db->prepare("SELECT StaffID,Email, Password FROM gu_staff WHERE Email = :email;");
        $req->bindValue(':email',$email);
        $req->execute();
        $user = $req->fetch();
        if (!isset($user['Email']))
        {
          $error = "Invalid Email";
          break;
        }
        if ($password != $user['Password'])
        {
          $error = "Invalid Password";
          break;
        }
        $_SESSION['id'] = $user['StaffID'];
        break;
      case 'Trainer':
        $req = $db->prepare("SELECT TrainerID,Email, Password FROM gu_trainer WHERE Email = :email;");
        $req->bindValue(':email',$email);
        $req->execute();
        $user = $req->fetch();
        if (!isset($user['Email']))
        {
          $error = "Invalid Email";
          break;
        }
        if ($password != $user['Password'])
        {
          $error = "Invalid Password";
          break;
        }
        $_SESSION['id'] = $user['TrainerID'];
        break;
      case 'Trainee':
        $req = $db->prepare("SELECT TraineeID,Email, Password FROM gu_trainee WHERE Email = :email;");
        $req->bindValue(':email',$email);
        $req->execute();
        $user = $req->fetch();
        if (!isset($user['Email']))
        {
          $error = "Invalid Email";
          break;
        }
        if ($password != $user['Password'])
        {
          $error = "Invalid Password";
          break;
        }
        $_SESSION['id'] = $user['TraineeID'];
        break;
    }
    if(!isset($error))
    {
      $_SESSION['role'] = $role;
      header("Location: index.php");
      exit;
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Login - Training Management System</title>
    <!-- Icons-->
    <link href="assets/node_modules/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="assets/node_modules/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="assets/node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/node_modules/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/pace.min.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
  </head>
  <body class="app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
                <h1>Login</h1>
                <p class="text-muted">Sign In to your account</p>
                <form id="frmChange" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-user"></i>
                    </span>
                  </div>
                  <select class="form-control" name="role">
                    <option value="Administrator">Administrator</option>
                    <option value="Staff">Staff</option>
                    <option value="Trainer">Trainer</option>
                    <option value="Trainee">Trainee</option>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-envelope-open"></i>
                    </span>
                  </div>
                  <input class="form-control" type="text" name="email" placeholder="Email" required>
                </div>
                <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-lock"></i>
                    </span>
                  </div>
                  <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
                <span class="help-block"><?=$error;?></span>
                </form>
                <div class="row">
                  <div class="col-6">
                    <button class="btn btn-primary px-4" type="button" onclick="$('#frmChange').submit();">Login</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
              <div class="card-body text-center">
                <div>
                  <h2>Training Management System</h2>
                  <p>This system was developed by FPT Co. It used to manages the activity of “Training” for internal training program of the company.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="assets/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="assets/node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/node_modules/pace-progress/pace.min.js"></script>
    <script src="assets/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <script src="assets/node_modules/@coreui/coreui/dist/js/coreui.min.js"></script>
    <script src="assets/js/login.js"></script>
  </body>
</html>
