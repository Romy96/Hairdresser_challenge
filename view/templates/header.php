<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Kapperszaak</title>	
	<link rel="stylesheet" href="<?= URL ?>css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= URL ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= URL ?>css/stylesheet.css">
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
					<li><a href="<?=URL?>home/logOut"><i class="fa fa-sign-out" aria-hidden="true"></i>Uitloggen</a></li>
					<?php
					; else:
					?>
					<li><a href="<?=URL?>home/register">Registreren</a></li>
		            <li><a href="<?=URL?>home/login">Inloggen</a></li>
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
