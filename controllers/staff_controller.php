<?php
require_once('controllers/base_controller.php');
require_once('models/staff.php');

class StaffController extends BaseController
{
  function __construct()
  {
    $this->folder = 'staff';
  }

  public function index()
  {
    $staffs = Staff::all();
    $data = array('staffs' => $staffs);
    $this->render('index', $data);
  }
  public function show()
  {
    if(isset($_GET['id'])) $staff = Staff::find($_GET['id']);
    else $staff = Staff::find(-1);
    $data = array('staff' => $staff);
    $this->render('show', $data);
  }
  public function add()
  {
    Staff::add($_POST['name'],$_POST['email'],$_POST['password']);
    header("Location: index.php?controller=staff");
  }
  public function update()
  {
    Staff::update($_POST['id'],$_POST['name'],$_POST['email'],$_POST['password']);
    header("Location: index.php?controller=staff");
  }
  public function delete()
  {
    Staff::delete($_GET['id']);
    header("Location: index.php?controller=staff");
  }
}