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
		header("Location: " . URL . "home/login");
		exit();
	}
}

function login()
{
	render("home/login");
}