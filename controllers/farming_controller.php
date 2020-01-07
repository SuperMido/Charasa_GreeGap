<?php
require_once('controllers/base_controller.php');
require_once('models/farming.php');

class FarmingController extends BaseController
{
  function __construct()
  {
    $this->folder = 'farming';
  }

  function index()
  {
    $products = Farming::findbyFarm(1);
    $sensors = Farming::getSensor(1);
    $data = array('products' => $products, 'sensors' => $sensors);
    $this->render('index', $data);
  }

  function harvest()
  {
        Farming::harvest($_POST['id']);
        header("Location: index.php?controller=farming");
  }

  function add()
  {
    Farming::add(1,$_POST['name'],$_POST['des'],$_POST['pre_hash'],$_POST['sensorid']);
    header("Location: index.php?controller=farming");
  }

//  function sensor()
//  {
//    $sensors = Farming::getSensor(1);
//    $data = array('sensors'=>$sensors);
//    $this->render('index',$data);
//  }
}