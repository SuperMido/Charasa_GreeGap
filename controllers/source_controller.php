<?php
require_once('controllers/base_controller.php');
require_once('models/source.php');

class SourceController extends BaseController
{
  function __construct()
  {
    $this->folder = 'source';
  }

  function index()
  {
    $sources = Source::findbyUser($_SESSION['user']['id']);
    $data = array('sources' => $sources);
    $this->render('index', $data);
  }
  function add()
  {
    Source::add($_SESSION['user']['id'],$_POST['name'],$_POST['des']);
    header("Location: index.php?controller=source");
  }
}