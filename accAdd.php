<?php
  session_start();
  include 'import/dbLog.php';
  
  $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
  if(isset($_POST['coach'])){
    $ad = 1;
  }
  else{
    $ad = 0;
  }
  try{
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT Username FROM Users WHERE Username = :name;";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':name', $_POST['user']);
    $statement->execute();
    $pdo = null;
    
    if(!($row = $statement->fetch())){
      try{
          $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
          $sql = "INSERT INTO Users(Username, UserPassword, Admin) VALUES(:name, :pass, :admin);";
          $statement = $pdo->prepare($sql);
          $statement->bindValue(':name', $_POST['user']);
          $statement->bindValue(':pass', $password);
          $statement->bindValue(':admin', $ad);
          $statement->execute();
          $pdo = null;
    
          header("Location: http://".$_SERVER['HTTP_HOST']."/login.php");
      }
      catch(PDOException $e){
        die($e->getMessage());
      }
    }
    else{
      die("Username already used.");
      header("Location: http://".$_SERVER['HTTP_HOST']."/createAcc.php?msg=Username already in use");
    }
  }
  catch(PDOException $e){
    die($e->getMessage(""));
  }
?>