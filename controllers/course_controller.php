<?php
require_once('controllers/base_controller.php');
require_once('models/course.php');
require_once('models/category.php');

class CourseController extends BaseController
{
  function __construct()
  {
    $this->folder = 'course';
  }

  public function index()
  {
    $courses = Course::all();
    $data = array('courses' => $courses);
    $this->render('index', $data);
  }
  public function show()
  {
    $categories = Category::all();
    if(isset($_GET['id'])) $course = Course::find($_GET['id']);
    else $course = Course::find(-1);
    $data = array('course' => $course,'categories' => $categories);
    $this->render('show', $data);
  }
  public function list_assign()
  {
    $courseId = $_GET['id'];
    $trainees = Course::assign_trainee($_GET['id']);
    $data = array('trainees' => $trainees, 'courseId' => $courseId);
    $this->render('list_assign', $data);
  }
  public function list_unassign()
  {
    $courseId = $_GET['id'];
    $trainees = Course::unassign_trainee($_GET['id']);
    $data = array('trainees' => $trainees, 'courseId' => $courseId);
    $this->render('list_unassign', $data);
  }
  public function add_trainee()
  {
    Course::add_trainee($_POST['traineeId'],$_POST['courseId']);
    header("Location: index.php?controller=course");
  }
  public function remove_trainee()
  {
    Course::remove_trainee($_POST['traineeId'],$_POST['courseId']);
    header("Location: index.php?controller=course");
  }
  public function add()
  {
    Course::add($_POST['name'],$_POST['categoryId']);
    header("Location: index.php?controller=course");
  }
  public function update()
  {
    Course::update($_POST['id'],$_POST['name'],$_POST['categoryId']);
    header("Location: index.php?controller=course");
  }
  public function delete()
  {
    Course::delete($_GET['id']);
    header("Location: index.php?controller=course");
  }
  public function inprogress()
  {
    $courses = Course::inprogress($_SESSION['id']);
    $data = array('courses' => $courses);
    $this->render('inprogress', $data);
  }
}