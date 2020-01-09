<?php
require_once('controllers/base_controller.php');
require_once('models/product.php');

class ProductController extends BaseController
{
  function __construct()
  {
    $this->folder = 'product';
  }

  function index()
  {
    $products = Product::findAddedbyStore($_SESSION['user']['id']);
    $data = array('products' => $products,'is_legit'=>1);
    $this->render('index', $data);
  }

  function add()
  {
    $check = Product::add($_SESSION['user']['id'],$_POST['name'],$_POST['des'],$_POST['pre_hash']);
    if ($check==1){
        header("Location: index.php?controller=product");
    }
    else{
        $products = Product::findAddedbyStore($_SESSION['user']['id']);
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