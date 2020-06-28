<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Login Administrator</title>

   <link rel="stylesheet" href="<?= BASE_PATH ?>/public/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?= BASE_PATH ?>/public/css/login.css">
</head>
<body>
   
   <div class="row">
      <div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-4">
         <div class="panel panel-default">
            <div class="panel-heading"><h4>Login</h4></div>
            <div class="panel-body">
<?php
if(isset($msg)){
   echo "<div class='alert alert-danger'>$msg</div>";
}
?>
               <form role="form" action="<?= BASE_PATH ?>/admin/login/check" method="post">
                  <div class="form-group">
                     <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                  </div>
                  <div class="form-group">
                     <input class="form-control" placeholder="Password" name="password" type="password">
                  </div>
                  <div class="checkbox">
                     <label>
                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                     </label>
                  </div>
                  <button class="btn btn-info pull-right">Login Admin</button>
               </form>
            </div>
         </div>
      </div>
   </div>
   
</body>
</html>
