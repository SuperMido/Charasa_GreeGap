<?php
	$controllers = NULL;
	switch ($_SESSION['user']['role'])
	{
		case 'provider':
			$controllers = array(
			  'pages' => ['home', 'error','product'],
			  'source' => ['index', 'add'],
			  'scanned' => ['index']
			);
			break;
		case 'farm':
			$controllers = array(
			  'pages' => ['home', 'error','product'],
			  'farming'=>['index', 'add','harvest'],
			  'sensor' => ['index', 'add'],
			  'scanned' => ['index']
			);
			break;
		case 'transporter':
			$controllers = array(
			  'pages' => ['home', 'error','product'],
			  'transport' => ['index', 'add'],
			  'scanned' => ['index']
			);
			break;
		case 'store':
			$controllers = array(
			  'pages' => ['home', 'error','product'],
			  'product' => ['index', 'add'],
			  'scanned' => ['index']
			);
			break;
		case 'user':
			$controllers = array(
			  'pages' => ['home', 'error','product'],
			  'scanned' => ['index']
			  );
			break;
		default:
			$controllers = array(
			  'pages' => ['home', 'error','product']
		  	);
			break;
	}

	// Các controllers trong hệ thống và các action có thể gọi ra từ controller đó.

	//  $controllers = array(
	//    'pages' => ['home', 'error', 'product'],
	//    'source' => ['index', 'add'],
    //    'farming'=>['index', 'add','harvest'],
    //    'transport' => ['index', 'add'],
	// 	'sensor' => ['index', 'add'],
	// 	'product' => ['index', 'add']);

	// Nếu các tham số nhận được từ URL không hợp lệ (không thuộc list controller và action có thể gọi
	// thì trang báo lỗi sẽ được gọi ra.
	if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
	  $controller = 'pages';
	  $action = 'error';
	}

	// Nhúng file định nghĩa controller vào để có thể dùng được class định nghĩa trong file đó
	include_once('controllers/' . $controller . '_controller.php');
	// Tạo ra tên controller class từ các giá trị lấy được từ URL sau đó gọi ra để hiển thị trả về cho người dùng.
	$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
	$controller = new $klass;
	$controller->$action();