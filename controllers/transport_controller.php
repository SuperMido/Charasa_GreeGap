<?php
require_once('controllers/base_controller.php');
require_once('models/transport.php');
require_once('models/product.php');

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

  function approval()
  {
    $unapprovedProduct = Product::findUnapprovedProduct($_SESSION['user']['id']);
    $data = array('unapprovedProduct' => $unapprovedProduct);
    $this->render('approval', $data);
  }

  function approve()
  {
    Product::approveProduct($_GET['id']);
    header("Location: index.php?controller=transport&action=approval");
  }

//  function sensor()
//  {
//    $sensors = Farming::getSensor(1);
//    $data = array('sensors'=>$sensors);
//    $this->render('index',$data);
//  }
}