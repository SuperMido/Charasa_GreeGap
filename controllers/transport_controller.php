<?php
require_once('controllers/base_controller.php');
require_once('models/transport.php');

class TransportController extends BaseController
{
  function __construct()
  {
    $this->folder = 'transport';
  }

  function index()
  {
    $products = Transport::findbyTransporter($_SESSION['user']['id']);
    $data = array('products' => $products,'is_legit'=>1);
    $this->render('index', $data);
  }

  function add()
  {
    $check = Transport::add($_SESSION['user']['id'],$_POST['name'],$_POST['des'],$_POST['pre_hash'],$_POST['quantity']);
    if($check==1){
        header("Location: index.php?controller=transport");
    }
    else{
        $products = Transport::findbyTransporter($_SESSION['user']['id']);
        $data = array('products' => $products,'is_legit'=>0);
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