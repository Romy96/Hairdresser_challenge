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

function getAgenda()
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM agenda";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null; 

	return $query->fetchAll();
}

function getEmployeeFirstname()
{
	$db = openDatabaseConnection();

	$sql = "SELECT firstname FROM employees";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function insertTime($workdate = null, $start_time = null, $end_time = null, $hairdresser = null)
{
	$workdate = isset($_POST['workdate']) ? $_POST['workdate'] : null;
	$start_time = isset($_POST['start_time']) ? $_POST['start_time'] : null;
	$end_time = isset($_POST['end_time']) ? $_POST['end_time'] : null;
	$hairdresser = isset($_POST['hairdresser']) ? $_POST['hairdresser'] : null;

	$db = openDatabaseConnection();

	$sql = "INSERT INTO agenda (workdate, start_time, end_time, hairdresser) VALUES (:workdate, :start_time, :end_time, :hairdresser)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':workdate' => $workdate,
		':start_time' => $start_time,
		':end_time' => $end_time,
		':hairdresser' => $hairdresser
	));

	$db = null;

	return true;
}

function removeTimefromAgenda($id)
{
	$db = openDatabaseConnection();

	$sql = "DELETE agenda FROM agenda JOIN appointments ON appointments.workdate=agenda.workdate WHERE id=:id AND appointments.status!='Gereserveerd!'";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id
	));

	$db = null;

	return true;
}

function getReservations()
{
	$db = openDatabaseConnection();

	$sql = $sql = "SELECT appointments.*
		, customers.firstname AS 'customer.name'
		, employees.firstname AS 'employee.name'
		, appointments.workdate AS 'appointment.workdate'
		, appointments.status AS 'appointment.status'
		, appointments.customer AS 'appointment.customer'
		FROM appointments 
		JOIN customers ON customers.id = appointments.customer 
		JOIN employees ON employees.id = appointments.hairdresser
		WHERE appointments.status != 'Geannuleerd'";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function getCustomer($id)
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM customers WHERE id=:id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id
	));

	$db = null;

	return $query->fetch(PDO::FETCH_ASSOC);
}

function statusComplete($id)
{
	$db = openDatabaseConnection();

	$sql = "UPDATE appointments SET status = 'Klant geweest' WHERE id=:id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id
	));

	$db = null;

	return true;
}

function statusMove($id)
{
	$db = openDatabaseConnection();

	$sql = "UPDATE appointments SET status = 'Klant niet komen opdagen' WHERE id=:id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id
	));

	$db = null;

	return true;
}