<div class = "container">
  <div class="wrapper">
    <form action="<?=URL?>home/loginEmployeeAction" method="post" name="Login_Form" class="form-signin">       
        <h3 class="form-signin-heading">Login werknemer</h3>
        <hr class="colorgraph"><br>
        
        <input type="email" class="form-control" name="email" placeholder="Emailadres" required="" autofocus="" />
        <input type="password" class="form-control" name="password" placeholder="Wachtwoord" required=""/>          
       
        <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Login</button>        
    </form>     
  </div>
</div>