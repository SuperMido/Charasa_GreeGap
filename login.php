<?php
  session_start();
  if($_SESSION['user']['role'] != "Anonymous") header("Location: index.php");
  if(isset($_POST['username']))
  {
    $error = NULL;
    require_once('connection.php');
    $db = DB::getInstance();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $req = $db->prepare("SELECT * FROM user WHERE username = :username;");
    $req->bindValue(':username',$username);
    $req->execute();
    $user = $req->fetch();
    if ($username != $user['username'])
    {
      $error = "Invalid Username!";
    }
    else if ($password != $user['password'])
    {
      $error = "Invalid Password!";
    }
    if(!isset($error))
    {
      $_SESSION['user'] = $user;
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
      <meta name="author" content="Charasa Team - University of Greenwich (Vietnam) - Da Nang Campus">
      <link rel="icon" type="image/png" sizes="16x16" href="assets/img/brand/icon.png">
      <title>GreeGAP - Clean Food Chain Management System</title>
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
                      <i class="icon-envelope-open"></i>
                    </span>
                  </div>
                  <input class="form-control" type="text" name="username" placeholder="Username" required>
                </div>
                <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-lock"></i>
                    </span>
                  </div>
                  <input class="form-control" type="password" name="password" placeholder="Password" required>
                  <input type="submit" style="display:none"/>
                </div>
                <span class="help-block"><?php if(isset($error)) echo $error;?></span>
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
                    <img src="assets/img/brand/logicon.png">
                    <br>
                    <h3>Clean Food Chain Management System</h3>
                    <br>
                    <p>Developed by <strong>Charasa Team</strong></p>
                    <p><strong>University of Greenwich (Vietnam)</strong> - <strong>Da Nang</strong> Campus</p>
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
