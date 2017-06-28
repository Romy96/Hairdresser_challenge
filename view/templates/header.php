<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Kapperszaak</title>	
	<link rel="stylesheet" href="<?= URL ?>css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= URL ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= URL ?>css/stylesheet.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
</head>
<body>

<nav class="navbar navbar-inverse">
      <div class="container">
		 <div class="collapse navbar-collapse" id="navbar-collapse-4">
		        <ul class="nav navbar-nav navbar-right">
		            <li><a href="<?=URL?>home/index">Home</a></li>
		            <li><a href="<?=URL?>home/prices">Prijzen</a></li>
		            <?php
					if(isset($_SESSION['userId'])):
					?>
					<li><a href="<?=URL?>customer/times">Tijdstippen</a></li>
					<?php
					; elseif(isset($_SESSION['employeeId'])):
					?>
					<li><a href="<?=URL?>employee/registrations">Inschrijvingen</a></li>
					<li><a href="<?=URL?>employee/managementTimes">Beheer tijdstippen</a></li>
					<li><a href="<?=URL?>employee/reservations">Reserveringen</a></li>
					<?php
					endif;
					?>
					<?php
					if(isset($_SESSION['userId']) || isset($_SESSION['employeeId'])):
					?>
					<li><a href="<?=URL?>home/logOut"><i class="fa fa-sign-out" aria-hidden="true"></i>Uitloggen</a></li>
					<?php
					; else:
					?>
					<li><a href="<?=URL?>home/register">Registreren</a></li>
		            <li><a href="<?=URL?>home/login">Inloggen als klant</a></li>
		            <li><a href="<?=URL?>home/loginHairdresser">Inloggen als kapper</a></li>
		            <?php
		            endif;
		            ?>
		     	</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>

<div class="container">
	<?php
        // if errors found, print them
        if (isset($_SESSION['errors']) && is_array($_SESSION['errors']) && sizeof($_SESSION['errors'])>0 ) {
            echo '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Fout!</strong> <ul>';
            foreach($_SESSION['errors'] as $error) {
                echo '<li>' . $error . '</li>';
            }
            echo '</ul></div>';
            // errors are shown. now remove them from session
            $_SESSION['errors'] = [];
        }
    ?>

     <?php
    // if info messages found, print them
    if (isset($_SESSION['info']) && is_array($_SESSION['info']) && sizeof($_SESSION['info'])>0 ) {
        echo '<div class="alert alert-success alert-dismissable" id="alert-success-1"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Gelukt!</strong> <ul>';
        foreach($_SESSION['info'] as $info) {
            echo '<li>' . $info . '</li>';
        }
        echo '</ul></div>';
        // errors are shown. now remove them from session
        $_SESSION['info'] = [];
    }
    ?>
