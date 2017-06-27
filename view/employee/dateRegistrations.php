<?php
if(isset($registrations)):
?>
	<h1>Inschrijvingen op deze dag</h1>

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
                  </tr>
              </thead>   
              <tbody>
              	<?php
              	foreach($registrations as $row):
              	?>
                <tr>
                    <td><?=$row['customer.name']?></td>
                    <td><?=$row['employee.name']?></td>
                    <td><?=$row['appointment.workdate']?></td>
                    <td><?=$row['appointment.status']?></td>                                      
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