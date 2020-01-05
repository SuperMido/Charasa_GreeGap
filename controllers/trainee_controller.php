<?php
require_once('controllers/base_controller.php');
require_once('models/trainee.php');

class TraineeController extends BaseController
{
  function __construct()
  {
    $this->folder = 'trainee';
  }

  public function index()
  {
    $trainees = Trainee::all();
    $data = array('trainees' => $trainees);
    $this->render('index', $data);
  }
  public function show()
  {
    if(isset($_GET['id'])) $trainee = Trainee::find($_GET['id']);
    else $trainee = Trainee::find(-1);
    $data = array('trainee' => $trainee);
    $this->render('show', $data);
  }
  public function add()
  {
    $dob = date('Y-m-d', strtotime($_POST['dob']));
    $toeicScore = (float) $_POST['toeicScore'];
    Trainee::add($_POST['name'], $dob, $_POST['email'], $_POST['address'], $toeicScore, $_POST['password']);
    header("Location: index.php?controller=trainee");
  }
  public function update()
  {
    $dob = date('Y-m-d', strtotime($_POST['dob']));
    $toeicScore = (float) $_POST['toeicScore'];
    Trainee::update($_POST['id'],$_POST['name'], $dob, $_POST['email'], $_POST['address'], $toeicScore, $_POST['password']);
    header("Location: index.php?controller=trainee");
  }
  public function delete()
  {
    Trainee::delete($_GET['id']);
    header("Location: index.php?controller=trainee");
  }
  public function detail()
  {
    $trainee = Trainee::find($_SESSION['id']);
    $data = array('trainee' => $trainee);
    $this->render('detail', $data);
  }
}