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
  <h2>PUB CRAWL FORM </h2>
  <form action="pub_crawl.php" method= "post">
    <div class="form-group">
      <label for="Pub_Crawl_ID">Pub Crawl ID:</label>
      <input type="int" class="form-control" id="Pub_Crawl_ID" placeholder="Enter ID" name="Pub_Crawl_ID">
    </div>
    <div class="form-group">
      <label for="Pub_Crawl_Name">Pub Crawl Name</label>
      <input type="text" class="form-control" id="Pub_Crawl_Name" placeholder="Enter Name" name="Pub_Crawl_Name">
    </div>
    <button type="submit" name = "submit">Submit</button>
  </form>
</div>

    <div class="container">
  <h2>Pub Crawls</h2>           
  <table class="table">
    <thead>
      <tr>
        <th>Pub Crawl ID</th>
        <th>Name</th>
      </tr>
    </thead>

    <?php

  $sql = "SELECT Pub_Crawl_ID,  Pub_Crawl_Name from Pub_Crawl";
        $result = $conn -> query ($sql);
        if ($result -> num_rows > 0)
        {
            while ($row = $result -> fetch_assoc())
            {
                echo "<tr><td>".$row["Pub_Crawl_ID"]. "</td><td>". $row["Pub_Crawl_Name"]. "</td><td>";
            }
            echo "</table>";
        }
        else 
        {
            echo "0 result"; 
        }
    
         


 if(isset($_POST['submit']))
 {
     if(!empty($_POST['Pub_Crawl_ID']) && !empty($_POST['Pub_Crawl_Name'])){
         $pID = $_POST['Pub_Crawl_ID'];
         $pName = $_POST['Pub_Crawl_Name'];
 
         $query = "INSERT into Pub_Crawl (Pub_Crawl_ID, Pub_Crawl_Name) VALUES ('$pID','$pName')";
 
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