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
  <h2>PUZZLE HUNT FORM </h2>
  <form action="puzzle_hunt.php" method= "post">
    <div class="form-group">
      <label for="Puzzle_Hunt_ID">Puzzle Hunt ID:</label>
      <input type="int" class="form-control" id="Puzzle_Hunt_ID" placeholder="Enter ID" name="Puzzle_Hunt_ID">
    </div>
    <div class="form-group">
      <label for="Completion_Code">Completion Code</label>
      <input type="text" class="form-control" id="Completion_Code" placeholder="Enter Completion Code" name="Completion_Code">
    </div>
    <div class="form-group">
      <label for="Difficulty">Difficulty</label>
      <input type="int" class="form-control" id="Difficulty" placeholder="Enter Difficulty" name="Difficulty">
    </div>
    <div class="form-group">
      <label for="Puzzle_Hunt_Name">Puzzle Hunt Name</label>
      <input type="text" class="form-control" id="Puzzle_Hunt_Name" placeholder="Enter Name" name="Puzzle_Hunt_Name">
    </div>
    <button type="submit" name = "submit">Submit</button>
  </form>
</div>

    <div class="container">
  <h2>Puzzle Hunts</h2>           
  <table class="table">
    <thead>
      <tr>
        <th>Puzzle Hunt ID</th>
        <th>Completion Code</th>
        <th>Difficulty</th>
        <th>Puzzle Hunt Name</th>
      </tr>
    </thead>

    <?php

  $sql = "SELECT * from Puzzle_Hunt";
        $result = $conn -> query ($sql);
        if ($result -> num_rows > 0)
        {
            while ($row = $result -> fetch_assoc())
            {
                echo "<tr><td>".$row["Puzzle_Hunt_ID"]. "</td><td>". $row["Completion_Code"]. "</td><td>". $row["Difficulty"]."</td><td>". $row["Puzzle_Hunt_Name"]. "</td></tr>";
            }
            echo "</table>";
        }
        else 
        {
            echo "0 result"; 
        }
    
        
 


 if(isset($_POST['submit']))
 {
     if(!empty($_POST['Puzzle_Hunt_ID']) && !empty($_POST['Completion_Code']) && !empty($_POST['Difficulty']) && !empty($_POST['Puzzle_Hunt_Name'] )){
         $daisID = $_POST['Puzzle_Hunt_ID'];
         $dName = $_POST['Completion_Code'];
         $committee = $_POST['Difficulty']; 
         $position = $_POST['Puzzle_Hunt_Name'];
 
         $query = "INSERT into Puzzle_Hunt (Puzzle_Hunt_ID, Completion_Code, Difficulty, Puzzle_Hunt_Name) VALUES ('$daisID','$dName','$committee', '$position')";
 
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