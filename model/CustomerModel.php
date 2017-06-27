<?php

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

function getTimes()
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM agenda";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function getTimebyId($id)
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM agenda WHERE id=:id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id
	));

	$db = null;

	return $query->fetch(PDO::FETCH_ASSOC);
}

function createAppointment($customerId = null, $status = null, $date = null, $hairdresser = null)
{
	$customerId = isset($_POST['userid']) ? $_POST['userid'] : null;	
	$status = isset($_POST['status']) ? $_POST['status'] : null;
	$date = isset($_POST['date']) ? $_POST['date'] : null;
	$hairdresser = isset($_POST['hairdresser']) ? $_POST['hairdresser'] : null;

	$db = openDatabaseConnection();

	$sql = "SELECT * FROM employees WHERE firstname=:hairdresser";
	$query = $db->prepare($sql);
	$query->execute(array(
		':hairdresser' => $hairdresser
	));

	$row = $query->fetch(PDO::FETCH_ASSOC);

	$rowCount = $query->rowCount();

	$error_info = $query->errorInfo();
    if ( $error_info[0] != '00000') {
        // something went wrong
        $_SESSION['errors'][] = $error_info[2];
        return false;
    }

	if ($rowCount != 1)
	{
		$_SESSION['errors'][] = "id van kapper niet gevonden!";

		$db = null;

		return false;
	}
	elseif ($rowCount == 1)
	{
		$hairdresserId = $row['id'];

		$sql2 = "INSERT INTO appointments (customer, hairdresser, workdate, status) VALUES (:customerId, :hairdresserId, :workdate, :status)";
		$query2 = $db->prepare($sql2);
		$query2->execute(array(
			':customerId' => $customerId,
			':hairdresserId' => $hairdresserId,
			':workdate' => $date,
			':status' => $status
		));

		$db = null;

		return true;
	}
}

function getReservedAppointments($userid)
{
	$userid = $_SESSION['userId'];

	$db = openDatabaseConnection();

	$sql = "SELECT appointments.*
		, customers.firstname AS 'customer.name'
		, employees.firstname AS 'employee.name'
		, appointments.workdate AS 'appointment.workdate'
		, appointments.status AS 'appointment.status'
		FROM appointments 
		JOIN customers ON customers.id = appointments.customer 
		JOIN employees ON employees.id = appointments.hairdresser 
		WHERE appointments.customer=:userid";
	$query = $db->prepare($sql);
	$query->execute(array(
		':userid' => $userid
	));

	$db = null;

	return $query->fetchall();
}

function AppointmentCancel($id)
{
	$db = openDatabaseConnection();

	$sql = "UPDATE appointments SET status='Geannuleerd' WHERE id=:id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id
	));

	$db = null;

	return true;
}