<div class="app-body">
  <div class="sidebar">
    <nav class="sidebar-nav">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="./">
            <i class="nav-icon cil-check"></i> Scan Now!</a>
        </li>
        <?php if($_SESSION['user']['role']=='provider') {?>
            <li class="nav-item">
                <a class="nav-link" href="./?controller=source">
                    <i class="nav-icon cil-clipboard"></i> Manage Source</a>
            </li>
        <?php } else if($_SESSION['user']['role']=='farm') { ?>
            <li class="nav-item">
                <a class="nav-link" href="./?controller=farming">
                    <i class="nav-icon cil-plant"></i> Manage Farm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./?controller=sensor">
                    <i class="nav-icon cil-audio"></i> Manage Sensor</a>
            </li>
        <?php } else if($_SESSION['user']['role']=='transporter') { ?>
            <li class="nav-item">
                <a class="nav-link" href="./?controller=transport">
                    <i class="nav-icon cil-locomotive"></i> Manage Transport</a>
            </li>
        <?php } else if($_SESSION['user']['role']=='store') { ?>
            <li class="nav-item">
                <a class="nav-link" href="./?controller=product">
                    <i class="nav-icon cil-clipboard"></i> Manage Product</a>
            </li>
        <?php } ?>
        <?php if($_SESSION['user']['role']=='Anonymous') {?>
            <li class="nav-item">
                <a class="nav-link" href="./login.php">
                    <i class="nav-icon cil-user"></i> Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./#">
                    <i class="nav-icon cil-user-follow"></i> Register</a>
            </li>
        <?php } else { ?>
            <li class="nav-item">
                <a class="nav-link" href="./?controller=rating">
                    <i class="nav-icon fa fa-star-half-o"></i> Rated Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./?controller=scanned">
                    <i class="nav-icon fa fa-check-square-o"></i> Scanned Product</a>
            </li>
          <li class="nav-item">
                <a class="nav-link" href="./logout.php">
                    <i class="nav-icon cil-exit-to-app"></i> Logout</a>
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