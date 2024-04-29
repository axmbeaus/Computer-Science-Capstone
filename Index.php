<?php
include "session.php";
?>

<!DOCTYPE html>
<html>

<head>
<script src="import/main.js"></script>
<link rel="stylesheet" href="import/styles.css">
<?php include "import/dbLog.php"?>
<title>Home</title>
</head>

<body>
<?php require 'import/htmlIncludes.php'?>
<div>
  <h3>Selection:</h3> 
  <form method="post" action="statGen.php"> 
    <table>
      <tr>
        <td>
          <input type="radio" id="tm" name="statSelect" value="team" required>
          <label for="team">Team</label><br>
          <input type="radio" id="in" name="statSelect" value="indiv">
          <label for="indiv">Individual</label><br>
        </td>
        <td id="indivNames">
          <label for="wrestlers">Wrestlers:</label>
          <select id="wrest" name="wrestlers" size=1>
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
        </td>
      </tr>
      <tr colspan=2>
        <td>
          <br>
          <input id="statSmb" type="submit">
        </td>
      </tr>
  </table>
  </form>
</div>
</body>

</html>