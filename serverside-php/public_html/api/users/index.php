<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/assets/incl/init.php";

/**
 * Liste af users
 */
Route::add('/api/users/', function() {
	$users = new Users;
	$result = $users->list();
      echo Tools::jsonParser($result);
});

/**
 * Users detaljer
 */
Route::add('/api/users/([0-9]*)', function($id) {
	$users = new User;
	$result = $users->details($id);
	 echo Tools::jsonParser($result);
	
});

Route::add('/api/users/', function() {

	$users = new users;
	$users->firstname = isset($_POST['firstname']) && !empty($_POST['firstname']) ? $_POST['firstname'] : null;
	$users->lastname = isset($_POST['lastname']) && !empty($_POST['lastname']) ? $_POST['lastname'] : null;
	$users->birthdate = isset($_POST['birthdate']) && !empty($_POST['birthdate']) ? $_POST['birthdate'] : null;
	$users->email = isset($_POST['email']) && !empty($_POST['email']) ? (int)$_POST['email'] : null;
	$users->phone = isset($_POST['phone']) && !empty($_POST['phone']) ? (int)$_POST['phone'] : null;
	$users->zipcode = isset($_POST['zipcode']) && !empty($_POST['zipcode']) ? (int)$_POST['zipcode'] : null; 
	$users->city = isset($_POST['city']) && !empty($_POST['city']) ? (int)$_POST['city'] : null; 
	$users->country = isset($_POST['country']) && !empty($_POST['country']) ? (int)$_POST['country'] : null;
	$users->address = isset($_POST['address']) && !empty($_POST['address']) ? (int)$_POST['address'] : null;

	if($users->firstname && $users->lastname && $users->birthdate) {
		echo $users->create();
	} else {
		echo "Kan ikke oprette users.";
	}
}, 'post');

Route::add('/api/users/', function() {
	$data = file_get_contents("php://input");
	parse_str($data, $parsed_data);

	$users = new users;
	$users->id = isset($parsed_data['id']) && !empty($parsed_data['id']) ? (int)$parsed_data['id'] : null;
	$users->firstname = isset($parsed_data['firstname']) && !empty($parsed_data['title']) ? $parsed_data['title'] : null;
	$users->lastname = isset($parsed_data['lastname']) && !empty($parsed_data['lastname']) ? $parsed_data['lastname'] : null;
	$users->birthdate = isset($parsed_data['birthdate']) && !empty($parsed_data['birthdate']) ? (int)$parsed_data['birthdate'] : null;
	$users->email = isset($parsed_data['email']) && !empty($parsed_data['email']) ? (int)$parsed_data['email'] : null; 
	$users->phone = isset($parsed_data['phone']) && !empty($parsed_data['phone']) ? (int)$parsed_data['phone'] : null; 
	$users->zipcode = isset($parsed_data['zipcode']) && !empty($parsed_data['zipcode']) ? (int)$parsed_data['zipcode'] : null;
	$users->city = isset($parsed_data['city']) && !empty($parsed_data['city']) ? (int)$parsed_data['city'] : null; 
	$users->country = isset($parsed_data['country']) && !empty($parsed_data['country']) ? (int)$parsed_data['country'] : null;
	$users->address = isset($parsed_data['address']) && !empty($parsed_data['address']) ? (int)$parsed_data['address'] : null;
	if($users->id && $users->firstname && $users->lastname && $users->$birthdate) {
		echo $users->update();
	} else {
		echo false;
	}
}, 'put');

Route::add('/api/users/([0-9]*)', function($id) {
	$users = new users;
	echo $users->delete($id);
}, 'delete');

Route::run('/');
?>