<?php 
 include 'connect.php';
  ?> 

  <html>   
<head>   

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="header.css">
</head>
<body>
<?php 
 require 'header.php';

 ?>
<style>
body{
 background-image: linear-gradient(to right, lightsalmon, lightyellow);
}
</style>
 <br/> 
 
 
<div class="container">
  <h2>MENU FORM </h2>
  <form action="menu.php" method= "post">
    <div class="form-group">
      <label for="Menu_ID">Menu ID:</label>
      <input type="int" class="form-control" id="Menu_ID" placeholder="Enter ID" name="Menu_ID">
    </div>
    <div class="form-group">
      <label for="Menu_Web_Link">Web Link</label>
      <input type="text" class="form-control" id="Menu_Web_Link" placeholder="Enter Web Link" name="Menu_Web_Link">
    </div>
    <div class="form-group">
      <label for="Restaurant_Name">Restaurant Name</label>
      <input type="text" class="form-control" id="Restaurant_Name" placeholder="Enter name of restaurant" name="Restaurant_Name">
    </div>
    <div class="form-group">
      <label for="Place_ID">Place ID</label>
      <input type="int" class="form-control" id="Place_ID" placeholder="Enter the ID matching the restaurant/pub in the Place table" name="Place_ID">
    </div>
    <button type="submit" name = "submit">Submit</button>
  </form>
</div>

    <div class="container">
  <h2>Menu</h2>           
  <table class="table">
    <thead>
      <tr>
        <th>Menu ID</th>
        <th>Web Link</th>
        <th>Restaurant Name</th>
        <th>Place ID</th>
      </tr>
    </thead>

    <?php

  $sql = "SELECT Menu_ID,  Menu_Web_Link,  Restaurant_Name,  Place_ID from Menu";
        $result = $conn -> query ($sql);
        if ($result -> num_rows > 0)
        {
            while ($row = $result -> fetch_assoc())
            {
                echo "<tr><td>".$row["Menu_ID"]. "</td><td>". $row["Menu_Web_Link"]. "</td><td>". $row["Restaurant_Name"]."</td><td>". $row["Place_ID"]. "</td></tr>";
            }
            echo "</table>";
        }
        else 
        {
            echo "0 result"; 
        }
    
         


 if(isset($_POST['submit']))
 {
     if(!empty($_POST['Menu_ID']) && !empty($_POST['Menu_Web_Link']) && !empty($_POST['Restaurant_Name']) && !empty($_POST['Place_ID'] )){
         $mID = $_POST['Menu_ID'];
         $mwl = $_POST['Menu_Web_Link'];
         $rn = $_POST['Restaurant_Name']; 
         $pid = $_POST['Place_ID'];
 
         $query = "INSERT into Menu (Menu_ID, Menu_Web_Link, Restaurant_Name, Place_ID) VALUES ('$mID','$mwl','$rn', '$pid')";
 
         $run = mysqli_query($conn, $query) or die (mysqli_error());
 
         if($run)
         {
             echo "Data added successfully";
         }
         else 
         {
             echo "Data could not be added";
         }
 
     }
    
     else
     {
         echo "Please input data for all fields";
 
     }
 }

$conn->close();

?>
</table>
</div>
</body>
</html>