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
  <h2>PUZZLES IN PUZZLE HUNT FORM </h2>
  <form action="puzzles_in_puzzle_hunt.php" method= "post">
    <div class="form-group">
      <label for="Puzzle_Hunt_ID">Puzzle Hunt ID:</label>
      <input type="int" class="form-control" id="Puzzle_Hunt_ID" placeholder="Enter Puzzle Hunt ID" name="Puzzle_Hunt_ID">
    </div>
    <div class="form-group">
      <label for="Puzzle_ID">Puzzle ID</label>
      <input type="int" class="form-control" id="Puzzle_ID" placeholder="Enter Puzzle ID" name="Puzzle_ID">
    </div>
    <div class="form-group">
      <label for="Puzzle_Order">Puzzle Order</label>
      <input type="int" class="form-control" id="Puzzle_Order" placeholder="Enter Puzzle Order" name="Puzzle_Order">
    </div>
    <button type="submit" name = "submit">Submit</button>
  </form>
</div>

    <div class="container">
  <h2>Puzzles in Puzzle Hunt</h2>           
  <table class="table">
    <thead>
      <tr>
        <th>Puzzle Hunt ID</th>
        <th>Puzzle ID</th>
        <th>Puzzle Order</th>
      </tr>
    </thead>

    <?php

  $sql = "SELECT * from Puzzles_In_Puzzle_Hunt";
        $result = $conn -> query ($sql);
        if ($result -> num_rows > 0)
        {
            while ($row = $result -> fetch_assoc())
            {
                echo "<tr><td>".$row["Puzzle_Hunt_ID"]. "</td><td>". $row["Puzzle_ID"]. "</td><td>". $row["Puzzle_Order"]."</td><td>";
            }
            echo "</table>";
        }
        else 
        {
            echo "0 result"; 
        }
     


 if(isset($_POST['submit']))
 {
     if(!empty($_POST['Puzzle_Hunt_ID']) && !empty($_POST['Puzzle_ID']) && !empty($_POST['Puzzle_Order'])){
         $daisID = $_POST['Puzzle_Hunt_ID'];
         $dName = $_POST['Puzzle_ID'];
         $committee = $_POST['Puzzle_Order']; 
 
         $query = "INSERT into Puzzles_In_Puzzle_Hunt (Puzzle_Hunt_ID, Puzzle_ID, Puzzle_Order) VALUES ('$daisID','$dName','$committee')";
 
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