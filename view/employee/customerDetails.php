<?php
if(isset($customer)):
?>
<h1>Profiel <?=$customer['firstname']?></h1>
<br/>
<h4>Naam</h4>
<p><?=$customer['firstname']?> <?=$customer['prefix']?> <?=$customer['lastname']?></p>
<br/>
<h4>Gebruikersnaam</h4>
<p><?=$customer['username']?></p>
<br/>
<h4>Email</h4>
<p><?=$customer['email']?>?></p>
<br/>
<h4>Telefoonnummer</h4>
<p><?=$customer['phone_number']?></p>
<br/>
<?php
endif;
?>