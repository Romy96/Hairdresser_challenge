<?php
if(isset($times)):
?>

<h1>Afspraak maken</h1>

<p>Wilt u met deze kapper op deze datum en tijd een afspraak maken?</p>

<a href="<?=URL?>customer/times">Nee, dat wil ik niet!</a>

<form method="post" action="<?=URL?>customer/insertAppointment">
 <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            	<input type="hidden" name="userid" id="userid" value="<?=$_SESSION['userId']?>">
            	<input type="hidden" name="status" id="status" value="Gereserveerd">
                <label class="control-label" for="date">Datum</label>
                <input id="date" name="date" type="date" value="<?=$times['workdate']?>" class="form-control input-md">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
               	<label class="control-label" for="startTime">Start tijd</label>
                <input id="startTime" name="startTime" type="time" value="<?=$times['start_time']?>" class="form-control input-md">
            </div>
        </div>
        <div class="col-md-6">
           	<div class="form-group">
                <label class="control-label" for="endTime">Eind tijd</label>
               	<input id="endTime" name="endTime" type="time" value="<?=$times['end_time']?>" class="form-control input-md">
           	</div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label" for="hairdresser">Kapper</label>
                <input id="hairdresser" name="hairdresser" type="text" value="<?=$times['hairdresser']?>" class="form-control input-md">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <button id="singlebutton" name="singlebutton" class="btn btn-default">Maak een afspraak</button>
           	</div>
        </div>
 </div>
</form>

<?php
endif;
?>