<?php
if(isset($worktimes)):
?>
<h1>Beheer tijdstippen</h1>

<div class="col-xs-12">
        <div class="row">
            <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="<?=URL?>employee/createTime" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-plus" aria-hidden="true"></i> Nieuwe tijdstip
                    </a>
            </div>
        </div>

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
                      <th></th>                                    
                  </tr>
              </thead>   
              <tbody>
              	<?php
              	foreach($worktimes as $row):
              	?>
                <tr>
                    <td><?=$row['workdate']?></td>
                    <td><?=$row['start_time']?></td>
                    <td><?=$row['end_time']?></td>
                    <td><?=$row['hairdresser']?></td>
                    <td>
                    	<div class="btn-group">
                    		<a href="<?=URL?>employee/deleteTime/<?=$row['id']?>" onclick="return confirm('Weet je het zeker?')" class="btn btn-default btn-flat"><i class="fa fa-trash"></i></a>
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