<?php
  if(isset($_SESSION['userId'])):
?>
<h1>Welkom terug!</h1>
<?php
; else:
?>
<h1>Welkom!</h1>
<?php
endif;
?>