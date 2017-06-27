
<form class="form-horizontal" action='<?=URL?>home/registerAction' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Register</legend>
    </div>
     <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>

     <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="firstname">Voornaam</label>
      <div class="input-group">
      	<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
        <input type="text" id="firstname" name="firstname" placeholder="Vul uw voornaam in" class="form-control" required>
      </div>
    </div>

	<div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="prefix">Tussenvoegsel</label>
      <div class="controls">
        <input type="text" id="prefix" name="prefix" placeholder="Vul eventueel tussenvoegsel van uw achternaam in" class="form-control">
      </div>
    </div>

    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="lastname">Achternaam</label>
      <div class="input-group">
      	<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
        <input type="text" id="lastname" name="lastname" placeholder="Vul uw achternaam in (zonder tussenvoegsel)" class="form-control" required>
      </div>
    </div>
    
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username">Gebruikersnaam</label>
      <div class="input-group">
      	<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
        <input type="text" id="username" name="username" placeholder="Vul uw gebruikersnaam in" class="form-control" required>
      </div>
    </div>

    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Wachtwoord</label>
      <div class="input-group">
      	<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
        <input type="password" id="password" name="password" placeholder="Vul hier uw wachtwoord in" class="form-control" required>
      </div>
    </div>
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">Email</label>
      <div class="input-group">
      	<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
        <input type="email" id="email" name="email" placeholder="Vul hier uw email in" class="form-control" required>
      </div>
    </div>

    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="phone_number">Telefoonnummer</label>
      <div class="input-group">
      	<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span><i class="fa fa-phone" aria-hidden="true"></i></span>        
      	<input type="tel" id="phone_number" name="phone_number" placeholder="Vul uw telefoonnummer in (gebruik alleen cijfers)" class="form-control" required>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success">Register</button>
      </div>
    </div>
  </fieldset>
</form>