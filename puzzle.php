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
  <h2>PUZZLE FORM </h2>
  <form action="puzzle.php" method= "post">
    <div class="form-group">
      <label for="Puzzle_ID">Puzzle ID:</label>
      <input type="int" class="form-control" id="Puzzle_ID" placeholder="Enter ID" name="Puzzle_ID">
    </div>
    <div class="form-group">
      <label for="Rules">Rules</label>
      <input type="text" class="form-control" id="Rules" placeholder="Enter Rules" name="Rules">
    </div>
    <div class="form-group">
      <label for="Difficulty">Difficulty</label>
      <input type="int" class="form-control" id="Difficulty" placeholder="Enter Difficulty: 1 = easy, 2 = medium, 3 = hard" name="Difficulty">
    </div>
    <div class="form-group">
      <label for="Place_ID">Place ID</label>
      <input type="int" class="form-control" id="Place_ID" placeholder="Enter Place ID (Not Required)" name="Place_ID">
    </div>
    <button type="submit" name = "submit">Submit</button>
  </form>
</div>

    <div class="container">
  <h2>Puzzles</h2>           
  <table class="table">
    <thead>
      <tr>
        <th>Puzzle ID</th>
        <th>Rules</th>
        <th>Difficulty</th>
        <th>Place ID</th>
      </tr>
    </thead>

    <?php

  $sql = "SELECT * from Puzzle";
        $result = $conn -> query ($sql);
        if ($result -> num_rows > 0)
        {
            while ($row = $result -> fetch_assoc())
            {
                echo "<tr><td>".$row["Puzzle_ID"]. "</td><td>". $row["Rules"]. "</td><td>". $row["Difficulty"]."</td><td>". $row["Place_ID"]. "</td></tr>";
            }
            echo "</table>";
        }
        else 
        {
            echo "0 result"; 
        }
     


 if(isset($_POST['submit']))
 {
     if(!empty($_POST['Puzzle_ID']) && !empty($_POST['Rules']) && !empty($_POST['Difficulty'])){
         $daisID = $_POST['Puzzle_ID'];
         $dName = $_POST['Rules'];
         $committee = $_POST['Difficulty']; 
		 
		 if(!empty($_POST['Place_ID'])){
			$position = $_POST['Place_ID'];

			$query = "INSERT into Puzzle (Puzzle_ID, Rules, Difficulty, Place_ID) VALUES ('$daisID','$dName','$committee', '$position')";
		 }
		 else{
			$query = "INSERT into Puzzle (Puzzle_ID, Rules, Difficulty) VALUES ('$daisID','$dName','$committee')";

		 }
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