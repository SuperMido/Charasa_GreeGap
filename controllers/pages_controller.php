<?php
require_once('controllers/base_controller.php');
require_once('models/product.php');
require_once('models/scanned.php');

class PagesController extends BaseController
{
  function __construct()
  {
    $this->folder = 'pages';
  }

  public function home()
  {
    $this->render('home');
  }

  public function error()
  {
    $this->render('error');
  }
  public function product()
  {
      $hash = $_GET['hash'];
      $productInfo = Product::fetchAllData($hash);
      if($_SESSION['user']['role'] != "Anonymous") Scanned::add($_SESSION['user']['id'], $productInfo['product_id']);
      $data = array('productInfo' => $productInfo);
      $this->api('product', $data);
  }
}