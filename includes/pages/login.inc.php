<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Log-in</title>
  <link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
	<link rel="stylesheet" href="<?php View::getTemplatePath('login') ?>style.css">

</head>

<body>
  <div class="login-card">
    <h1>Log-in</h1><br>
  <form method="post" action="">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" name="login" class="login login-submit" value="Login">
  </form>
  
  
<?php 
  
  if(isset($_POST['login'])){
	  $username = trim($_POST['username']);
	  $password = trim(md5($_POST['password']));
	  
	  Users::user_login($username, $password);
	  
  }
  
  
  
 ?>
  
</div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>

  
</body>
</html>
