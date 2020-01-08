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
    $data = array('products' => $products);
    $this->render('index', $data);
  }

  function add()
  {
    Transport::add($_SESSION['user']['id'],$_POST['name'],$_POST['des'],$_POST['pre_hash'],$_POST['quantity']);
    header("Location: index.php?controller=transport");
  }

//  function sensor()
//  {
//    $sensors = Farming::getSensor(1);
//    $data = array('sensors'=>$sensors);
//    $this->render('index',$data);
//  }
}