<!DOCTYPE html>
<html>

<head>
<script src = "import/main.js"></script>
<link rel="stylesheet" href="import/styles.css">
<title>Update</title>
<?php include "import/dbLog.php"?>
</head>

<body>
  <?php require 'import/htmlIncludes.php'?>
  <h3>Wrestler Update</h3>
  <form method='post' action='verifyWrestEdit.php'> 
  <label for="wrestlers">Wrestler:</label>
  <select name="wrestlers" size=1 require>
    <option value="">N/A</option>
  <?php
  try{
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT DISTINCT FirstName, LastName, WrestlerID FROM Wrestler ORDER BY LastName, FirstName;";
    $result = $pdo->query($sql);
    
    while($row = $result->fetch()){
      echo "<option value=".$row["WrestlerID"].">".$row["FirstName"]." ".$row["LastName"]."</option>";
    }
    
    $pdo = null;
  }
  catch(PDOException $e){
    die($e->getMessage());
  }      
  ?>
  </select>
  <br>
  <input type='checkbox' id='NQ' name='NQ' value='NQ'>
  <lable for='NQ'>National Qualifier</label><br>
  <input type='checkbox' id='AA' name='AA' value='AA'>
  <label for'AA'>All American</label><br>
  <br>
  <input type="submit">
</form>
</body>

</html>