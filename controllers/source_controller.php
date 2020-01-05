<?php
require_once('controllers/base_controller.php');

class SourceController extends BaseController
{
  function __construct()
  {
    $this->folder = 'source';
  }
}