<!DOCTYPE html>
<html>

<head>
<script src = "import/main.js"></script>
<link rel="stylesheet" href="import/styles.css">
<title>Login</title>
</head>

<body>
<?php require 'import/htmlIncludes.php'?>
<div>
  <h3>Login:</h3> 
  <form method="post" action="verifyLogin.php">
    Username:<br>
    <input name='userName' id='userName' type='text'>
    <br>
    Password:<br>
    <input name='passW' id='passW' maxlength='20' minlength='8' type='password'>
    <br>
    <br>
    <input id='lginSbmt' type='submit'>
    <br>
    <br>
    <a href="createAcc.php">Create Account</a>
  </form>
</div>
</body>

</html>