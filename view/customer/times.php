<?php
if(isset($times)):
?>

<h1>Tijdstippen</h1>

<div class="container">
	<div class="row">
		<div class="span5">
            <table class="table table-striped table-condensed">
                  <thead>
                  <tr>
                      <th>Datum</th>
                      <th>Start tijd</th>
                      <th>Eind tijd</th>
                      <th>Kapper</th>                                          
                  </tr>
              </thead>   
              <tbody>
              	<?php
              	foreach($times as $time):
              	?>
                <tr>
                    <td><a href="<?=URL?>customer/makeAppointment/<?=$time['id']?>"><?=$time['workdate']?></a></td>
                    <td><a href="<?=URL?>customer/makeAppointment/<?=$time['id']?>"><?=$time['start_time']?></a></td>
                    <td><a href="<?=URL?>customer/makeAppointment/<?=$time['id']?>"><?=$time['end_time']?></a></td>
                    <td><a href="<?=URL?>customer/makeAppointment/<?=$time['id']?>"><?=$time['hairdresser']?></a></td>                                       
                </tr>
                <?php
                endforeach;
                ?>                         
              </tbody>
            </table>
            </div>
	</div>
</div>
<?php
endif;
?>

<?php
if(isset($appointments)):
?>

<h1>Gemaakte afspraken</h1>

<div class="container">
	<div class="row">
		<div class="span5">
           <table class="table table-striped table-condensed">
                  <thead>
                  <tr>
                      <th>Klant</th>
                      <th>Kapper</th>
                      <th>Datum</th>
                      <th>Status</th>
                      <th></th>                                        
                  </tr>
              </thead>   
              <tbody>
              	<?php
              	foreach($appointments as $row):
              	?>
                <tr>
                    <td><?=$row['customer.name']?></td>
                    <td><?=$row['employee.name']?></td>
                    <td><?=$row['appointment.workdate']?></td>
                    <td><?=$row['appointment.status']?></td>
                    <td>
                    	<div class="btn-group">
                    		<?php
                    		if ($row['appointment.status'] == "Gereserveerd"):
                    		?>
                    		<a href="<?=URL?>customer/cancelAppointment/<?=$row['id']?>" onclick="return confirm('Weet je het zeker?')">Annuleren</a>
                    		<?php
                    		endif;
                    		?>
                    	</div>
                    </td>                                      
                </tr>
                <?php
                endforeach;
                ?>                         
              </tbody>
            </table>
            </div>
	</div>
</div>
<?php
endif;
?>