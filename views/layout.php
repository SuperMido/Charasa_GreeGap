<div class="app-body">
  <div class="sidebar">
    <nav class="sidebar-nav">
      <ul class="nav">
        <?php //if($_SESSION['role']=='Administrator') {?>
        <!--<li class="nav-item">
          <a class="nav-link" href="./?controller=trainer">
            <i class="nav-icon icon-user"></i> Trainers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./?controller=staff">
            <i class="nav-icon icon-user"></i> Staffs</a>
        </li>
        <?php //} ?>
        <?php //if($_SESSION['role']=='Staff') {?>
        <li class="nav-item">
          <a class="nav-link" href="./?controller=trainee">
            <i class="nav-icon icon-user"></i> Trainees</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./?controller=category">
            <i class="nav-icon icon-pencil"></i> Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./?controller=course">
            <i class="nav-icon icon-pencil"></i> Courses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./?controller=topic">
            <i class="nav-icon icon-pencil"></i> Topics</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./?controller=trainer">
            <i class="nav-icon icon-user"></i> Trainers</a>
        </li>
        <?php //} ?>
        <?php //if($_SESSION['role']=='Trainer') {?>
        <li class="nav-item">
          <a class="nav-link" href="./?controller=topic&action=inprogress">
            <i class="nav-icon icon-pencil"></i> Assigned Topic</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./?controller=trainer&action=detail">
            <i class="nav-icon icon-user"></i> Edit information</a>
        </li>
        <?php //} ?>
        <?php //if($_SESSION['role']=='Trainee') {?>
        <li class="nav-item">
          <a class="nav-link" href="./?controller=course&action=inprogress">
            <i class="nav-icon icon-pencil"></i> Assigned Course</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./?controller=trainee&action=detail">
            <i class="nav-icon icon-user"></i> My Information</a>
        </li>-->
        <?php //} ?>
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