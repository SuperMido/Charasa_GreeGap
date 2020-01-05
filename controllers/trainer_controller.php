<?php
require_once('controllers/base_controller.php');
require_once('models/trainer.php');

class TrainerController extends BaseController
{
  function __construct()
  {
    $this->folder = 'trainer';
  }

  public function index()
  {
    $trainers = Trainer::all();
    $data = array('trainers' => $trainers);
    $this->render('index', $data);
  }
  public function show()
  {
    if(isset($_GET['id'])) $trainer = Trainer::find($_GET['id']);
    else $trainer = Trainer::find(-1);
    $data = array('trainer' => $trainer);
    $this->render('show', $data);
  }
  public function add()
  {
    Trainer::add($_POST['name'],$_POST['email'],$_POST['telephone'],$_POST['password']);
    header("Location: index.php?controller=trainer");
  }
  public function update()
  {
    Trainer::update($_POST['id'],$_POST['name'],$_POST['email'],$_POST['telephone'],$_POST['password']);
    header("Location: index.php?controller=trainer");
  }
  public function delete()
  {
    Trainer::delete($_GET['id']);
    header("Location: index.php?controller=trainer");
  }
  public function detail()
  {
    $trainer = Trainer::find($_SESSION['id']);
    $data = array('trainer' => $trainer);
    $this->render('show', $data);
  }
}