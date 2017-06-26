<?php

function RegisterAccount($firstname = null, $prefix = null, $lastname = null, $username = null, $password = null, $email = null, $phone_number = null)
{
	$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : null;
	$prefix = isset($_POST['prefix']) ? $_POST['prefix'] : null;
	$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : null;
	$username = isset($_POST['username']) ? $_POST['username'] : null;
	$password = isset($_POST['password']) ? $_POST['password'] : null;
	$hash = md5($password);
	$email = isset($_POST['email']) ? $_POST['email'] : null;
	$phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : null;

	if (strlen($firstname) == 0 || strlen($lastname) == 0 || strlen($username) == 0 || strlen($password) == 0 || strlen($email) == 0 || strlen($phone_number) == 0) {
		return false;
	}

	$db = openDatabaseConnection();

	$sql = "INSERT INTO customers (firstname, prefix, lastname, username, password, email, phone_number) VALUES (:firstname, :prefix, :lastname, :username, :password, :email, :phone_number)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':firstname' => $firstname,
		':prefix' => $prefix,
		':lastname' => $lastname,
		':username' => $username,
		':password' => $hash,
		':email' => $email,
		':phone_number' => $phone_number
	));

	$error_info = $query->errorInfo();
    if ( $error_info[0] != '00000') {
        // something went wrong
        $_SESSION['errors'][] = $error_info[2];
        return false;
    }

	$db = null;
		
	return true;
}