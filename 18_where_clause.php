<?php
  // Connecting to database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "dbManku";

  // Create a connection
  $conn = mysqli_connect($servername, $username, $password, $database);

  // Die if connection was not successful
  if (!$conn){
      die("Sorry we failed to connect: ". mysqli_connect_error());
  }
  else{
      echo "Connection was successful<br>";
  }

  // Adding sql to it
  $sql = "SELECT * FROM `phptrip` Where `dest`= 'Bihar'";
  $result = mysqli_query($conn, $sql);

  // Find the number of records returned
  $num = mysqli_num_rows($result);
  echo $num;
  echo " records found in the DataBase<br>";
  $no = 1;

   // Display the rows returned by the sql query
   if($num> 0){
   while($row = mysqli_fetch_assoc($result)){
    echo $row['sno'] . ". Hello ". $row['name'] . " Welcome to ". $row['dest'];
    echo "<br>";
    $no = $no + 1;
    }
   }

   // Usage of WHERE Clause to Update Data
   $sql = "UPDATE `phptrip` SET `name` = 'shayam' WHERE `phptrip`.`sno` = 4;";
   $result = mysqli_query($conn, $sql);
   echo var_dump($result);
   $aff = mysqli_affected_rows($conn);
   echo "<br>Number of affected rows: $aff <br>";
   if($result){
       echo "We updated the record successfully";
   }
   else{
       echo "We could npot update the record successfully";
   }


   // Usage of Delete and Limit
   $sql = "DELETE FROM `phptrip` WHERE `dest` = 'russia' LIMIT 3";
   $result = mysqli_query($conn, $sql);
   echo var_dump($result);
   $aff = mysqli_affected_rows($conn);
   echo "<br>Number of affected rows: $aff <br>";
   if($result){
       echo "Deleted successfully";
   }
   else{
       $err = mysqli_error($conn);
       echo "Not deleted successfully due to this erroer ---> $err";
   }
  ?>