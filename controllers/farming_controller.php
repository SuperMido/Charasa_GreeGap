<?php
require_once('controllers/base_controller.php');
require_once('models/source.php');

class FarmingController extends BaseController
{
  function __construct()
  {
    $this->folder = 'source';
  }

  function index()
  {
    $sources = Source::findbyUser(1);
    $data = array('sources' => $sources);
    $this->render('index', $data);
  }
  function add()
  {
    Source::add(1,$_POST['name'],$_POST['des']);
    header("Location: index.php?controller=source");
  }
}