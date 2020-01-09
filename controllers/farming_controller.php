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
    $products = Farming::findbyFarm($_SESSION['user']['id']);
    $sensors = Farming::getSensor($_SESSION['user']['id']);
    $harvesteds = Farming::findHarvested($_SESSION['user']['id']);
    $data = array('products' => $products, 'sensors' => $sensors,'harvesteds'=>$harvesteds,'is_legit'=>1);
    $this->render('index', $data);
  }

  function harvest()
  {
        Farming::harvest($_GET['id']);
        header("Location: index.php?controller=farming");
  }

  function add()
  {
    $check = Farming::add($_SESSION['user']['id'],$_POST['name'],$_POST['des'],$_POST['pre_hash'],$_POST['sensorid']);
    if($check==1){
        header("Location: index.php?controller=farming");
    }
    else{
        $products = Farming::findbyFarm($_SESSION['user']['id']);
        $sensors = Farming::getSensor($_SESSION['user']['id']);
        $harvesteds = Farming::findHarvested($_SESSION['user']['id']);
        $data = array('products' => $products, 'sensors' => $sensors,'harvesteds'=>$harvesteds,'is_legit'=>$check);
        $this->render('index', $data);
    }
  }

//  function sensor()
//  {
//    $sensors = Farming::getSensor(1);
//    $data = array('sensors'=>$sensors);
//    $this->render('index',$data);
//  }
}