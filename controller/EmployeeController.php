<?php

require(ROOT . "model/EmployeeModel.php");

function registrations($workdate = '')
{
	if(IsLoggedInSessionEmployee() == false)
	{
		$_SESSION['errors'][] = "U heeft nog niet ingelogd!";
		header("Location: " . URL . "home/loginHairdresser");
		exit();
	}
	else
	{
		$workdates = getDateofAppointments($workdate);

		if(empty($workdates))
		{
			$_SESSION['errors'][] = "Datums zijn niet gevonden!";
			header("Location: " . URL . "home/index");
			exit();
		}
		elseif(isset($workdates))
		{
			render("employee/registrations", array(
				'workdates' => $workdates
			));
		}
	}
}

function dateRegistrations($workdate = '')
{
	if(IsLoggedInSessionEmployee() == false)
	{
		$_SESSION['errors'][] = "U heeft nog niet ingelogd!";
		header("Location: " . URL . "home/loginHairdresser");
		exit();
	}
	else
	{
		$registrations = getAppointmentsbyDate($workdate);

		if(empty($registrations))
		{
			$_SESSION['errors'][] = "Inschrijvingen zijn niet gevonden!";
			header("Location: " . URL . "home/index");
			exit();
		}
		elseif(isset($registrations))
		{
			render("employee/dateRegistrations", array(
				'registrations' => $registrations
			));
		}
	}
}

function allRegistrations()
{
	if(IsLoggedInSessionEmployee() == false)
	{
		$_SESSION['errors'][] = "U heeft nog niet ingelogd!";
		header("Location: " . URL . "home/loginHairdresser");
		exit();
	}
	else
	{
		$registrations = getAllAppointments();

		if(empty($registrations))
		{
			$_SESSION['errors'][] = "Inschrijvingen zijn niet gevonden!";
			header("Location: " . URL . "home/index");
			exit();
		}
		elseif(isset($registrations))
		{
			render("employee/allRegistrations", array(
				'registrations' => $registrations
			));
		}
	}
}

function managementTimes()
{
	if(IsLoggedInSessionEmployee() == false)
	{
		$_SESSION['errors'][] = "U heeft nog niet ingelogd!";
		header("Location: " . URL . "home/loginHairdresser");
		exit();
	}
	else
	{
		$worktimes = getAgenda();

		if(empty($worktimes))
		{
			$_SESSION['errors'][] = "De agenda is leeg!";
			header("Location: " . URL . "home/index");
			exit();
		}
		elseif(isset($worktimes))
		{
			render("employee/managementTimes", array(
				'worktimes' => $worktimes
			));
		}
	}
}

function createTime()
{
	if(IsLoggedInSessionEmployee() == false)
	{
		$_SESSION['errors'][] = "U heeft nog niet ingelogd!";
		header("Location: " . URL . "home/loginHairdresser");
		exit();
	}
	else
	{
		$hairdresser = getEmployeeFirstname();

		if(empty($hairdresser))
		{
			$_SESSION['errors'][] = "Naam van kapper niet gevonden!";
			header("Location: " . URL . "employee/managementTimes");
			exit();
		}
		elseif(isset($hairdresser))
		{
			render("employee/createTime", array(
				'hairdresser' => $hairdresser
			));
		}
	}
}

function saveTime()
{
	if(IsLoggedInSessionEmployee() == false)
	{
		$_SESSION['errors'][] = "U heeft nog niet ingelogd!";
		header("Location: " . URL . "home/loginHairdresser");
		exit();
	}
	elseif(IsLoggedInSessionEmployee() == true)
	{
		if(empty($_POST['workdate']) && empty($_POST['start_time']) && empty($_POST['end_time']) && empty($_POST['hairdresser']))
		{
			$_SESSION['errors'][] = "De velden zijn leeg!";
			header("Location: " . URL . "employee/createTime");
			exit();
		}
		elseif(isset($_POST['workdate']) && isset($_POST['start_time']) && isset($_POST['end_time']) && isset($_POST['hairdresser']))
		{
			insertTime($_POST['workdate'], $_POST['start_time'], $_POST['end_time'], $_POST['hairdresser']);
			$_SESSION['errors'][] = "Er is een nieuw tijdstip in het agenda toegevoegd!";
			header("Location: " . URL . "employee/managementTimes");
			exit();
		}
	}
}