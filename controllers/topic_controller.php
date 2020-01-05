<?php
require_once('controllers/base_controller.php');
require_once('models/topic.php');
require_once('models/trainer.php');
require_once('models/course.php');

class TopicController extends BaseController
{
  function __construct()
  {
    $this->folder = 'topic';
  }

  public function index()
  {
    $topics = Topic::all();
    $data = array('topics' => $topics);
    $this->render('index', $data);
  }
  public function show()
  {
    $trainers = Trainer::all();
    $courses = Course::all();
    if(isset($_GET['id'])) $topic = Topic::find($_GET['id']);
    else $topic = Topic::find(-1);
    $data = array('topic' => $topic, 'trainers' => $trainers, 'courses' => $courses);
    $this->render('show', $data);
  }
  public function add()
  {
    Topic::add($_POST['name'],$_POST['trainerId'],$_POST['courseId']);
    header("Location: index.php?controller=topic");
  }
  public function update()
  {
    Topic::update($_POST['id'],$_POST['trainerId'],$_POST['courseId'],$_POST['name']);
    header("Location: index.php?controller=topic");
  }
  public function delete()
  {
    Topic::delete($_GET['id']);
    header("Location: index.php?controller=topic");
  }
  public function inprogress()
  {
    $topics = Topic::inprogress($_SESSION['id']);
    $data = array('topics' => $topics);
    $this->render('inprogress', $data);
  }
}