<h1>Creër tijdstip</h1>

    <div class="row">
        <form role="form" method="post" action="<?=URL?>employee/saveTime" enctype="multipart/form-data">
                <div class="col-md-12">
                    <div class="nav-tabs-custom">   <!-- white background -->
                        <div class="box-body">      <!-- some whitespace -->
                            <div class="box-body">  
                                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                                <div class="form-group">
                                    <label for="workdate">Datum:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                        <input type="date" class="form-control" id="workdate" name="workdate" placeholder="Vul datum in" required>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label for="start_time">Start tijd:</label>
                                     <div class="input-group">
                                     	<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                        <input class="form-control" placeholder="Vul tijd in waarbij de afspraak van start gaat" name="start_time" type="time" id="start_time" required>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="end_time">Eind tijd:</label>
                                    <div class="input-group">
                                    	<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                        <input type="time" class="form-control" placeholder="Vul tijd in wanneer de afspraak eindigt" id="end_time" name="end_time" required>
                                	</div>
                                </div>
                                <div class='form-group'>
                                    <label for="hairdresser">Kapper:</label>
                                     <div class="input-group">
                                        <?php
                                        if(isset($hairdresser)):
                                            foreach($hairdresser as $row):
                                        ?>
                                            <div class="checkbox">
                                              <label><input type="checkbox" name="hairdresser" value="<?=$row['firstname']?>"><?=$row['firstname']?></label>
                                            </div>
                                        <?php
                                                endforeach;
                                            endif;
                                        ?>
                                    </div>
                                </div>
                                <input type="submit" name="btn-submit" id="submit" value="Submit" class="btn btn-info pull-right">
                            </div>
                        </div>
                    </div>
            </div>
        </form>
    </div>