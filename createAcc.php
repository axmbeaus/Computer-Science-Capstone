<!DOCTYPE html>
<html>

<head>
<script src = "import/main.js"></script>
<link rel="stylesheet" href="import/styles.css">
<title>Create Account</title>
</head>

<body>
<?php require 'import/htmlIncludes.php'?>
<div>
  <h3>Account Creation:</h3> 
    <form method="post" action="accAdd.php">
    Username:<br>
    <input name='user' id='user' type='text' required>
    <br>
    <br>
    Password:<br>
    <input name='pass' id='pass' type='password' maxlength='20' minlength='8' required>
    <br>
    Retype Password: <br>
    <input name='pass2' id='pass2' type='password' maxlength='20' minlength='8' required>
    <br>
    <br>
    <input type='checkbox' id='coach' value ='coach' name ='coach'>
    <label for='coach'>Coach</label>
    <br>
    <br>
    <input id='accSbmt' type='submit'>
  </form>
</div>
</body>

</html>