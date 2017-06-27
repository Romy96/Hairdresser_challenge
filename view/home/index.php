<?php
  if(isset($_SESSION['userId']) || isset($_SESSION['employeeId'])):
?>
<h1>Welkom terug!</h1>
<?php
; else:
?>
<h1>Welkom!</h1>
<?php
endif;
?>