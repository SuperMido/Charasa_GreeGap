<?php
require_once('controllers/base_controller.php');
require_once('models/rating.php');

class RatingController extends BaseController
{
  function __construct()
  {
    $this->folder = 'rating';
  }

  function index()
  {
    $ratings = Rating::findbyUser($_SESSION['user']['id']);
    $data = array('ratings' => $ratings);
    $this->render('index', $data);
  }
  function add()
  {
    Rating::add($_SESSION['user']['id'],$_POST['des'],$_POST['mac']);
    header("Location: index.php?controller=rating");
  }
}
?>