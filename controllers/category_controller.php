<?php
require_once('controllers/base_controller.php');
require_once('models/category.php');

class CategoryController extends BaseController
{
  function __construct()
  {
    $this->folder = 'category';
  }

  public function index()
  {
    $categories = Category::all();
    $data = array('categories' => $categories);
    $this->render('index', $data);
  }
  public function show()
  {
    if(isset($_GET['id'])) $category = Category::find($_GET['id']);
    else $category = Category::find(-1);
    $data = array('category' => $category);
    $this->render('show', $data);
  }
  public function add()
  {
    Category::add($_POST['name'],$_POST['description']);
    header("Location: index.php?controller=category");
  }
  public function update()
  {
    Category::update($_POST['id'],$_POST['name'],$_POST['description']);
    header("Location: index.php?controller=category");
  }
  public function delete()
  {
    Category::delete($_GET['id']);
    header("Location: index.php?controller=category");
  }
}