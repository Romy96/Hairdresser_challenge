<?php
if(isset($workdates)):
?>

<h1>Inschrijvingen</h1>

<p>Selecteer op welke datum u de inschrijvingen wilt zien</p>

<ul>
	<?php
	foreach ($workdates as $workdate):
	?>
	<li><a href="<?=URL?>employee/dateRegistrations/<?=$workdate['workdate']?>"><?=$workdate['workdate']?></a></li>
	<?php
	endforeach;
	?>
</ul>

<?php
endif;
?>

<p>Maar als u alle inschrijvingen wilt zien, klik dan op deze link hieronder</p>

<a href="<?=URL?>employee/allRegistrations">Alle inschrijvingen</a>
