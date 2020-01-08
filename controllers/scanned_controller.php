<?php
require_once('controllers/base_controller.php');
require_once('models/scanned.php');

class ScannedController extends BaseController
{
  function __construct()
  {
    $this->folder = 'scanned';
  }

  function index()
  {
    $scanneds = Scanned::findbyUser($_SESSION['user']['id']);
    $data = array('scanneds' => $scanneds);
    $this->render('index', $data);
  }
}
?>