<?php if( is_user_logged_in()){wp_redirect(home_url('member-dashboard'));exit();}?>
<div class="container">
  <div class="row">
    <div class="col-md-8">
    <?php
if(isset($_GET['Registration']) && !empty($_GET['Registration']) && $_GET['Registration']=="successful"){
  echo "<h3> Your Registration was successful, Please Login to your Account </h3>";
}

if(isset($_GET['login']) && !empty($_GET['login']) && $_GET['login']=="invalid_username"){
  echo "<h3 class='text-danger'> Your Username is Invalid, Please check and Try Again</h3>";
}

if(isset($_GET['login']) && !empty($_GET['login']) && $_GET['login']=="incorrect_password"){
  echo "<h3 class='text-danger'> The Password You ProvideD is incorrect, Please check and Try Again</h3>";
}

 ?>
 <div class="panel panel-default">
   <div class="panel-body">
 <form class="form-horizontal" action="<?php echo wp_login_url();?>" method="post">
   <div class="form-group">
     <label class="control-label col-md-3" for="email">Email Address</label>
     <div class="col-md-8">
     <input type="text" class="form-control" name="log" id="email" placeholder="Your Email Address">
   </div>
   </div>
   <div class="form-group">
     <label class="control-label col-md-3" for="pwd">Password</label>
     <div class="col-md-8">
        <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Your Password">
     </div>
   </div>
     <div class="form-group">
       <div class="col-md-8 col-md-offset-3">
          <input type="submit" name="submit" class="form-control" id="pwd" value="Sign In">
       </div>
   </div>
 </form>
  </div>
  </div>
</div>
</div>
</div>
