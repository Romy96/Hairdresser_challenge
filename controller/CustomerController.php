<?php

require(ROOT . "model/CustomerModel.php");

function times()
{
	// Als u nog niet ingelogd heeft, dan gaat u naar de login pagina van klant
	if ( IsLoggedInSession()==false ) {
		$_SESSION['errors'][] = "U heeft nog niet ingelogd!";
		header("Location: " . URL . "home/login");
		exit();
	}
	// Zowel, dan haal je de functie van model op en zet je het in een variable
	elseif ( IsLoggedInSession()==true ) 
	{
		$times = getTimes();

		$appointments = getReservedAppointments($_SESSION['userId']);

		// Als die leeg is, geef dan error aan
		if(empty($times) && empty($reservedAppointments))
		{
			$_SESSION['errors'][] = "Er is niks gevonden!";
			header("Location: " . URL . "home/index");
			exit();
		}
		// Zoniet, dan ga je zonder problemen naar de volgende pagina
		elseif(isset($times) && isset($appointments))
		{
			render("customer/times", array(
				'times'	=> $times,
				'appointments' => $appointments
			));
		}
	}
}

function makeAppointment($id = '')
{
	// Als u nog niet ingelogd heeft, dan gaat u naar de login pagina van klant
	if ( IsLoggedInSession()==false ) {
		$_SESSION['errors'][] = "U heeft nog niet ingelogd!";
		header("Location: " . URL . "home/login");
		exit();
	}
	// Zowel, dan haal je de functie van model op en zet je het in een variable
	elseif ( IsLoggedInSession()==true ) 
	{
		$times = getTimebyId($id);

		// Als die leeg is, geef dan error aan
		if(empty($times))
		{
			$_SESSION['errors'][] = "Kan tijdstip bij id! " . $id . "niet vinden!";
			header("Location: " . URL . "customer/times");
			exit();
		}
		// Zoniet, dan ga je zonder problemen naar de volgende pagina
		elseif(isset($times))
		{
			render("customer/makeAppointment", array(
				'times'	=> $times
			));
		}
	}
}

function insertAppointment()
{
	// Als u nog niet ingelogd heeft, dan gaat u naar de login pagina van klant
	if ( IsLoggedInSession()==false ) {
		$_SESSION['errors'][] = "U heeft nog niet ingelogd!";
		header("Location: " . URL . "home/login");
		exit();
	}
	// Zowel, dan check je of $_POST leeg is of niet, maar alleen de $_POSTs dat belangrijk zijn
	elseif ( IsLoggedInSession()==true ) 
	{
		// Als de geselecteerde $_POSTs leeg zijn, dan ga je terug naar het formulier
		if(empty($_POST['userid']) && empty($_POST['status']) && empty($_POST['date']) && empty($_POST['hairdresser']))
		{
			$timeId = getTimebyId($id);

			$_SESSION['errors'][] = "Deze velden zijn op één of ander manier leeg!";
			header("Location: " . URL . "customer/makeAppointment/" . $timeId);
			exit();
		}
		// Maar zoniet, dan wordt de query in de volgende functie uitgevoerd
		elseif(isset($_POST['userid']) && isset($_POST['status']) && isset($_POST['date']) && isset($_POST['hairdresser']))
		{
			createAppointment($_POST['userid'], $_POST['status'], $_POST['date'], $_POST['hairdresser']);
			$_SESSION['errors'][] = "U heeft gereserveerd voor een afspraak.";
			header("Location: " . URL . "customer/times");
			exit();
		}
	}
}

function cancelAppointment($id = '')
{
	// Als u nog niet ingelogd heeft, dan gaat u naar de login pagina van klant
	if ( IsLoggedInSession()==false ) {
		$_SESSION['errors'][] = "U heeft nog niet ingelogd!";
		header("Location: " . URL . "home/login");
		exit();
	}
	// Zowel, dan voer je de functie uit
	elseif ( IsLoggedInSession()==true ) 
	{
		AppointmentCancel($id);
		$_SESSION['errors'][] = "Uw afspraak is geannuleerd";
		header("Location: " . URL . "customer/times");
		exit();
	}
}