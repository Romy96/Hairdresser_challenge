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