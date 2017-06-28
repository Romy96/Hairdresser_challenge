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

function loginClient($email, $password)
{
	// check voor email en wachtwoord
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	// maak verbinding met database
	$db = openDatabaseConnection();

	// selecteer uit tabel waarbij email en wachtwoord hetzelfde zijn dan wat u heeft ingevuld. Zo ja, voer de query uit.
	$sql = "SELECT * FROM customers WHERE email=:email AND password=:password";
	$query = $db->prepare($sql);
	$query->execute(array(
		':email' => $email,
		':password' => $password
	));

	$row = $query->fetch(PDO::FETCH_ASSOC);
 	$rowCount  = $query->rowCount();

 	// Als er één rij gevonden is, sla het op in de sessie voor de volgende functie
    if($rowCount == 1 )
	{
		$_SESSION['userId'] = $row['id'];
		$_SESSION['logged in'] = true;
		$_SESSION['email'] = $email;
	}
	else
	{
		$_SESSION['userid'] = null; 
		$_SESSION['email'] = null; 
		$db = null;
		return false;
	}

	$db = null;

	return true;
}

function loginEmployee($email, $password)
{
	// check voor email en wachtwoord
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	// maak verbinding met database
	$db = openDatabaseConnection();

	// selecteer uit tabel waarbij email en wachtwoord hetzelfde zijn dan wat u heeft ingevuld. Zo ja, voer de query uit.
	$sql = "SELECT * FROM employees WHERE email=:email AND password=:password";
	$query = $db->prepare($sql);
	$query->execute(array(
		':email' => $email,
		':password' => $password
	));

	$row = $query->fetch(PDO::FETCH_ASSOC);
 	$rowCount  = $query->rowCount();

 	// Als er één rij gevonden is, sla het op in de sessie voor de volgende functie
    if($rowCount == 1 )
	{
		$_SESSION['employeeId'] = $row['id'];
		$_SESSION['logged in'] = true;
		$_SESSION['emailEmployee'] = $email;
	}
	else
	{
		$_SESSION['employeeId'] = null; 
		$_SESSION['emailEmployee'] = null; 
		$db = null;
		return false;
	}

	$db = null;

	return true;
}

function IsLoggedInSessionClient() {
	// Als $_SESSION['userId'] leeg is of niet bestaat, dan krijg je 0 terug. Anders krijg je een 1 terug
	if (isset($_SESSION['userId'])==false || empty($_SESSION['userId']) ) {
		return 0;
	}
	else
	{
		return 1;
	}
}

function IsLoggedInSessionEmployee() {
	// Als $_SESSION['userId'] leeg is of niet bestaat, dan krijg je 0 terug. Anders krijg je een 1 terug
	if (isset($_SESSION['employeeId'])==false || empty($_SESSION['employeeId']) ) {
		return 0;
	}
	else
	{
		return 1;
	}
}

function LogOut() {
	$_SESSION['info'][] = "Logged out";
	header("location: " . URL . "home/index");
// Haal sessie leeg na uitloggen
	$_SESSION = [];
}