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
    <a href="view.php" class="btn btn-primary">View</a>
    <a href="add.php" class="btn btn-primary pull-right">Add</a>
    <form method="post">
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Roll-no</th>
          <th>Email</th>
          <th>Attendance</th>
        </tr>
      </thead>
      <tbody>
      <?php
               
               $query="select * from student";
               $result=$link->query($query);
               while($show=$result->fetch_assoc()){


               
          
      ?>
        <tr>
          <td><?php echo $show['name']; ?></td>
          <td><?php echo $show['rollno']; ?></td>
          <td><?php echo $show['email']; ?></td>
          <td>
          Present  <input required type="radio" name="attendance[<?php echo $show['std_id']; ?>]" value="Present"> Absent<input required type="radio" name="attendance[<?php echo $show['std_id']; ?>]" value="Present">
          </form>
        </tr>
     <?php } ?>
    
      </tbody>
      </form>
      <?php 
      
      if($_SERVER['REQUEST_METHOD']=='POST'){
        $att=$_POST['attendance'];
        $date=date('d-m-y');
       
        $query="select distinct date from attendance";
        $result=$link->query($query);
        $b=false;
        if($result->num_rows>0){
        while($check=$result->fetch_assoc()){
        if($date==$check['date']){
          $b=true;
          echo "<div class='alert alert-danger'>
          Attendance already taken today!!;
          </div>";
        }
        }
      }
        if(!$b){
          foreach ($att as $key => $value){
              if($value=="Present"){

              $query="insert into attendance(value,std_id,date) values('Present','$key','$date')";
              $insertResult=$link->query($query);
              
              }
              else{
                
              $query="insert into attendance(value,std_id,date) values('Absent','$key','$date')";
              $insertResult=$link->query($query);

              }
          }
          if($insertResult){
            echo "<div class='alert alert-Success'>
          Attendance taken Successfully!!;
          </div>";

          }
        }

      }
      
    



      ?>
    </table> 
    <input type="submit" value="Take Attendance" class="btn btn-primary">
 
  </div>
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