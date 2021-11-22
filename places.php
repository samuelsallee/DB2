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
  <h2>PLACES FORM </h2>
  <form action="places.php" method= "post">
    <div class="form-group">
      <label for="place_ID">Place ID:</label>
      <input type="int" class="form-control" id="Place_ID" placeholder="Enter ID" name="Place_ID">
    </div>
    <div class="form-group">
      <label for="place_Name">Place Name</label>
      <input type="text" class="form-control" id="Place_Name" placeholder="Enter Name" name="Place_Name">
    </div>
    <div class="form-group">
      <label for="gps_location">GPS Location</label>
      <input type="text" class="form-control" id="GPS_Location" placeholder="Enter GPS Location xx.xxxxxxx, yy.yyyyyyyy" name="GPS_Location">
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" class="form-control" id="Address" placeholder="Enter Address" name="Address">
    </div>
	<div class="form-group">
      <label for="description">Description</label>
      <input type="text" class="form-control" id="Description" placeholder="Enter Description" name="Description">
    </div>
	<div class="form-group">
      <label for="kind_of_place">Kind Of Place</label>
      <input type="text" class="form-control" id="Kind_Of_Place" placeholder="Enter Kind Of Place: R for restaurant, P for pub X for other" name="Kind_Of_Place">
    </div>
    <button type="submit" name = "submit">Submit</button>
  </form>
</div>

    <div class="container">
  <h2>Places</h2>           
  <table class="table">
    <thead>
      <tr>
        <th>Place ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Type of Place</th>
      </tr>
    </thead>

    <?php

  $sql = "SELECT Place_ID,  Place_Name,  Description,  Kind_Of_Place from Place";
        $result = $conn -> query ($sql);
        if ($result -> num_rows > 0)
        {
            while ($row = $result -> fetch_assoc())
            {
                echo "<tr><td>".$row["Place_ID"]. "</td><td>". $row["Place_Name"]. "</td><td>". $row["Description"]."</td><td>". $row["Kind_Of_Place"]. "</td></tr>";
            }
            echo "</table>";
        }
        else 
        {
            echo "0 result"; 
        }
    
        

 if(isset($_POST['submit']))
 {
     if(!empty($_POST['Place_ID']) && !empty($_POST['Place_Name']) && !empty($_POST['GPS_Location']) && !empty($_POST['Address'] ) && !empty($_POST['Description'] ) && !empty($_POST['Kind_Of_Place'] )){
         $pID = $_POST['Place_ID'];
         $pName = $_POST['Place_Name'];
         $gp = $_POST['GPS_Location']; 
         $add = $_POST['Address'];
         $desc= $_POST['Description'];
		 $ptype= $_POST['Kind_Of_Place'];
		 
         $query = "INSERT into Place (Place_ID, Place_Name, GPS_Location, Address, Description, Kind_Of_Place) VALUES ('$pID','$pName','$gp', '$add', '$desc', '$ptype')";
 
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