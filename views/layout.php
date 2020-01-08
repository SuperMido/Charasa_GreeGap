<div class="app-body">
  <div class="sidebar">
    <nav class="sidebar-nav">
      <ul class="nav">
        <?php if($_SESSION['user']['role']=='provider') {?>
            <li class="nav-item">
                <a class="nav-link" href="./?controller=source">
                    <i class="nav-icon icon-user"></i> Manage Source</a>
            </li>
        <?php } else if($_SESSION['user']['role']=='farm') { ?>
            <li class="nav-item">
                <a class="nav-link" href="./?controller=farming">
                    <i class="nav-icon icon-user"></i> Manage Farm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./?controller=sensor">
                    <i class="nav-icon icon-user"></i> Manage Sensor</a>
            </li>
        <?php } else if($_SESSION['user']['role']=='transporter') { ?>
            <li class="nav-item">
                <a class="nav-link" href="./?controller=transport">
                    <i class="nav-icon icon-user"></i> Manage Transport</a>
            </li>
        <?php } else if($_SESSION['user']['role']=='store') { ?>
            <li class="nav-item">
                <a class="nav-link" href="./?controller=product">
                    <i class="nav-icon icon-user"></i> Manage Product</a>
            </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="./">
              <i class="nav-icon icon-user"></i> Scan Now!</a>
          </li>
        <?php } ?>
        <?php if($_SESSION['user']['role']=='Anonymous') {?>
            <li class="nav-item">
                <a class="nav-link" href="./login.php">
                    <i class="nav-icon icon-user"></i> Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./#">
                    <i class="nav-icon icon-user"></i> Register</a>
            </li>
        <?php } else { ?>
          <li class="nav-item">
                <a class="nav-link" href="./logout.php">
                    <i class="nav-icon icon-user"></i> Logout</a>
            </li>
        <?php } ?>
      </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
  </div>
  <main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item"><?=isset($_GET['controller'])? ucwords($_GET['controller']):""?></li>
      <!-- Breadcrumb Menu-->
      <li class="breadcrumb-menu d-md-down-none">
      </li>
    </ol>
    <div class="container-fluid">
      <?= @$content ?>
    </div>
  </main>
</div>