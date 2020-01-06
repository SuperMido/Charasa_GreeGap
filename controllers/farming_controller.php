<?php
require_once('controllers/base_controller.php');
require_once('models/source.php');

class FarmingController extends BaseController
{
  function __construct()
  {
    $this->folder = 'farming';
  }

  function index()
  {
    $farms = Farming::findbyFarm(1);
    $data = array('farms' => $farms);
    $this->render('index', $data);
  }
  function add()
  {
    Source::add(1,$_POST['name'],$_POST['des']);
    header("Location: index.php?controller=source");
  }
}