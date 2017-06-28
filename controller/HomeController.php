<?php

require(ROOT . "model/HomeModel.php");

function index()
{
	render("home/index");	
}

function prices()
{
	render("home/prices");
}

function register()
{
	render("home/register");
}

function registerAction()
{
	if(empty($_POST['firstname']) && empty($_POST['lastname']) && empty($_POST['username']) && empty($_POST['password']) && empty($_POST['email']) && empty($_POST['phone_number']))
	{
		$_SESSION['errors'] = 'Één van deze velden of meerdere velden zijn niet ingevuld!';
		header("Location: " . URL . "home/register");
		exit();
	}

	if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['phone_number']))
	{
		RegisterAccount($_POST['firstname'], $_POST['prefix'], $_POST['lastname'], $_POST['username'], $_POST['password'], $_POST['email'], 
			$_POST['phone_number']);
		$_SESSION['info'][] = "De account is gemaakt!";
		header("Location: " . URL . "home/login");
		exit();
	}
}

function login()
{
	if ( IsLoggedInSessionClient()==true ) {
		$_SESSION['errors'][] = "U bent al ingelogd!";
		header("Location: " . URL . "home/index");
		exit();
	}
	else
	{
		render("home/login");
	}
}

function loginAction()
{
	// Als u al ingelogd heeft, dan gaat u terug naar de hoofdpagina
	if ( IsLoggedInSessionClient()==true ) {
		$_SESSION['errors'][] = "U bent al ingelogd!";
		header("Location: " . URL . "home/index");
		exit();
	}
	// Anders als $_POST bestaat, dan start u de functie in Model. Als de functie succesvolis uitgevoerd, dan gaat u terug naar de hoofdpagina.
	else {
		if(isset($_POST["email"]) && isset($_POST["password"])) {
			if(loginClient($_POST['email'], $_POST['password']))
			{
				header("Location:" . URL . "home/index");
				exit();
			}else{
				// Zoniet, dan ga je terug naar de login pagina met een foutmelding
				header("Location: " . URL . "home/login");
				$_SESSION['errors'][] = 'Er ging iets mis!';
				exit();
			}
		}
		else
		{
			header("Location: " . URL . "home/login");
			exit();
		}
	}
}

function loginHairdresser()
{
	if(IsLoggedInSessionEmployee() == true)
	{
		$_SESSION['errors'][] = "U bent al ingelogd!";
		header("Location: " . URL . "home/index");
		exit();
	}
	else
	{
		render("home/loginHairdresser");
	}
}

function loginEmployeeAction()
{
	// Als u al ingelogd heeft, dan gaat u terug naar de hoofdpagina
	if ( IsLoggedInSessionEmployee()==true ) {
		$_SESSION['errors'][] = "U bent al ingelogd!";
		header("Location: " . URL . "home/index");
		exit();
	}
	// Anders als $_POST bestaat, dan start u de functie in Model. Als de functie succesvolis uitgevoerd, dan gaat u terug naar de hoofdpagina.
	else {
		if(isset($_POST["email"]) && isset($_POST["password"])) {
			if(loginEmployee($_POST['email'], $_POST['password']))
			{
				header("Location:" . URL . "home/index");
				exit();
			}else{
				// Zoniet, dan ga je terug naar de login pagina met een foutmelding
				header("Location: " . URL . "home/loginHairdresser");
				$_SESSION['errors'][] = 'Er ging iets mis!';
				exit();
			}
		}
		else
		{
			header("Location: " . URL . "home/loginHairdresser");
			exit();
		}
	}
}