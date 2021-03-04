<?php
include_once("connection.php");
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>ABC School</title>
    <style>
        h1{
            text-align: center;
            padding-top: 2%;
            padding-bottom: 2%;
            background-color: blueviolet;
            text-shadow: chartreuse;
        }
    </style>
  </head>
  <body>
    
    

    
<div class="panel panel-default container">
  <div class="panel-heading">
   
  <h1 >Attendance Management System</h1>

  </div>
  <div class="panel-body">
  <?php
  

  if($_SERVER['REQUEST_METHOD']=='POST'){
      $name=$_POST['name'];
      $rollno=$_POST['rollno'];
      $email=$_POST['email'];

      if($name=="" || $rollno="" || $email=""){
        echo "<div class='alert alert-danger'>
        Field must not be empty;
        
        
        
        
        
        </div>";

      }
      
      else{

      $query="insert into student(name,rollno,email) values('$name','$rollno','$email')";
      $result=$link->query($query);
      if($result){
          echo "<div class='alert alert-success'>
          Data Inserted Successfully;
          
          
          
          
          
          </div>";
      }
    }
  }

  ?>
  <form method="post">
    <a href="#" class="btn btn-primary">View</a>
    <a href="index.php" class="btn btn-primary pull-right">Back</a>
   
 <div class="form-group">
 <label for="name">Name:</label>
 <input type="text" name="name" class="form-control">
 </div>
 
 <div class="form-group">
 <label for="name">Roll-No:</label>
 <input type="text" name="rollno" class="form-control">
 </div>

 <div class="form-group">
 <label for="name">Email:</label>
 <input type="text" name="email" class="form-control">
 </div>
<input type="submit" class="btn btn-primary">
  </div>
  </form>
  <div class="panel-footer">

  </div>
</div>
















    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>