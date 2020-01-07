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
    $sensors = Sensor::findbyUser(1);
    $data = array('sensors' => $sensors);
    $this->render('index', $data);
  }
  function add()
  {
    Sensor::add(1,$_POST['name'],$_POST['des'],$_POST['mac']);
    header("Location: index.php?controller=sensor");
  }
}
?>