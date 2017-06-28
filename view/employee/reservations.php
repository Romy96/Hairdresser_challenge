<?php
if(isset($reservations)):
?>
<h1>Reserveringen</h1>

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
                      <th></th>                                     
                  </tr>
              </thead>   
              <tbody>
              	<?php
              	foreach($reservations as $row):
              	?>
                <tr>
                    <td><?=$row['customer.name']?></td>
                    <td><?=$row['employee.name']?></td>
                    <td><?=$row['appointment.workdate']?></td>
                    <td><?=$row['appointment.status']?></td>
                    <td>
                    	<div class="btn-group">
                    		<?php
                    		if($row['appointment.status'] == 'Gereserveerd'):
                    		?>
                    		<a href="<?=URL?>employee/completeAppointment/<?=$row['id']?>">Afronden</a>
                    		<a href="<?=URL?>employee/moveAppointment/<?=$row['id']?>">Verzetten</a>
                    		<?php
                    		endif;
                    		?>
                    	</div>
                    </td>
                    <td><a href="<?=URL?>employee/customerDetails/<?=$row['appointment.customer']?>">Openen</a></td>            
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