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
  <h2>DISCOUNTED ITEMS FORM </h2>
  <form action="discounted_items.php" method= "post">
    <div class="form-group">
      <label for="Item_ID">Item ID:</label>
      <input type="int" class="form-control" id="Item_ID" placeholder="Enter ID" name="Item_ID">
    </div>
    <div class="form-group">
      <label for="Item_Name">Item Name</label>
      <input type="text" class="form-control" id="Item_Name" placeholder="Enter Item Name" name="Item_Name">
    </div>
    <div class="form-group">
      <label for="Menu_ID">Menu ID</label>
      <input type="int" class="form-control" id="Menu_ID" placeholder="Enter Corresponding Menu ID" name="Menu_ID">
    </div>
    <button type="submit" name = "submit">Submit</button>
  </form>
</div>

    <div class="container">
  <h2>Discounted Items</h2>           
  <table class="table">
    <thead>
      <tr>
        <th>Item ID</th>
        <th>Item Name</th>
        <th>Menu ID</th>
      </tr>
    </thead>

    <?php

  $sql = "SELECT Item_ID, Item_Name, Menu_ID  from Discounted_Items";
        $result = $conn -> query ($sql);
        if ($result -> num_rows > 0)
        {
            while ($row = $result -> fetch_assoc())
            {
                echo "<tr><td>".$row["Item_ID"]. "</td><td>". $row["Item_Name"]. "</td><td>". $row["Menu_ID"]."</td><td>";
            }
            echo "</table>";
        }
        else 
        {
            echo "0 result"; 
        }
     


 if(isset($_POST['submit']))
 {
     if(!empty($_POST['Item_ID']) && !empty($_POST['Item_Name']) && !empty($_POST['Menu_ID'])){
         $iID = $_POST['Item_ID'];
         $iName = $_POST['Item_Name'];
         $mID = $_POST['Menu_ID']; 
 
         $query = "INSERT into Discounted_Items (Item_ID, Item_Name, Menu_ID) VALUES ('$iID','$iName','$mID')";
 
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