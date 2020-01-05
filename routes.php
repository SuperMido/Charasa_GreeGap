<?php
	$controllers = NULL;
	switch ($_SESSION['role'])
	{
		case 'Administrator':
			$controllers = array(
			  'pages' => ['home', 'error'],
			  'trainer' => ['index', 'update', 'delete', 'show', 'add'],
			  'staff' => ['index', 'update', 'delete', 'show', 'add']
			);
			break;
		case 'Staff':
			$controllers = array(
			  'pages' => ['home', 'error'],
			  'category' => ['index', 'update', 'delete', 'show', 'add'],
			  'trainer' => ['index', 'update', 'delete', 'show', 'add'],
			  'topic' => ['index', 'update', 'delete', 'show', 'add'],
			  'trainee' => ['index', 'update', 'delete', 'show', 'add'],
			  'course' => ['index', 'update', 'delete', 'show', 'add', 'list_unassign', 'add_trainee', 'list_assign', 'remove_trainee']
			);
			break;
		case 'Trainer':
			$controllers = array(
			  'pages' => ['home', 'error'],
			  'trainer' => ['detail'],
			  'topic' => ['inprogress']
			);
			break;
		case 'Trainee':
			$controllers = array(
			  'pages' => ['home', 'error'],
			  'trainee' => ['detail'],
			  'course' => ['inprogress']
			);
			break;
	}

	// Các controllers trong hệ thống và các action có thể gọi ra từ controller đó.

	// $controllers = array(
	//   'pages' => ['home', 'error'],
	//   'category' => ['index', 'update', 'delete', 'show', 'add'],
	//   'trainer' => ['index', 'update', 'delete', 'show', 'add', 'detail'],
	//   'topic' => ['index', 'update', 'delete', 'show', 'add', 'inprogress'],
	//   'staff' => ['index', 'update', 'delete', 'show', 'add'],
	//   'trainee' => ['index', 'update', 'delete', 'show', 'add', 'detail'],
	//   'course' => ['index', 'update', 'delete', 'show', 'add', 'list_unassign', 'add_trainee', 'list_assign', 'remove_trainee','inprogress']
	// );

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