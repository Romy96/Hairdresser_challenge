<?php
if(isset($registrations)):
?>
	<h1>Alle Inschrijvingen</h1>

<div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="registrations" class="display" cellspacing="0" width="100%">
                  <thead>
                  <tr>
                      <th class="no-sort">Klant</th>
                      <th>Kapper</th>
                      <th>Datum</th>
                      <th class="no-sort">Status</th>                                      
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
<?php
endif;
?>