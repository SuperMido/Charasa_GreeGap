<?php
require_once('controllers/base_controller.php');
require_once('models/sensor.php');

class SensorController extends BaseController
{
  function __construct()
  {
    $this->folder = 'sensor';
  }

  function index()
  {
    $sensors = Sensor::findbyUser($_SESSION['user']['id']);
    $data = array('sensors' => $sensors);
    $this->render('index', $data);
  }
  function add()
  {
    Sensor::add($_SESSION['user']['id'],$_POST['des'],$_POST['mac']);
    header("Location: index.php?controller=sensor");
  }
}
?>