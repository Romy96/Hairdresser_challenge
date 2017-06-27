<?php

function IsLoggedInSessionEmployee() {
	// Als $_SESSION['employeeId'] leeg is of niet bestaat, dan krijg je 0 terug. Anders krijg je een 1 terug
	if (isset($_SESSION['employeeId'])==false || empty($_SESSION['employeeId']) ) {
		return 0;
	}
	else
	{
		return 1;
	}
}

function getDateofAppointments()
{
	$db = openDatabaseConnection();

	$sql = "SELECT workdate FROM appointments";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function getAppointmentsbyDate($workdate)
{
	$db = openDatabaseConnection();

	$sql = "SELECT appointments.*
		, customers.firstname AS 'customer.name'
		, employees.firstname AS 'employee.name'
		, appointments.workdate AS 'appointment.workdate'
		, appointments.status AS 'appointment.status'
		FROM appointments 
		JOIN customers ON customers.id = appointments.customer 
		JOIN employees ON employees.id = appointments.hairdresser 
		WHERE appointments.workdate=:workdate";
	$query = $db->prepare($sql);
	$query->execute(array(
		':workdate' => $workdate
	));

	$db = null;

	return $query->fetchAll();
}

function getAllAppointments()
{
	$db = openDatabaseConnection();

	$sql = "SELECT appointments.*
		, customers.firstname AS 'customer.name'
		, employees.firstname AS 'employee.name'
		, appointments.workdate AS 'appointment.workdate'
		, appointments.status AS 'appointment.status'
		FROM appointments 
		JOIN customers ON customers.id = appointments.customer 
		JOIN employees ON employees.id = appointments.hairdresser";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}