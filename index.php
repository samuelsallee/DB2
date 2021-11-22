 
 <?php 
 include "connect.php";
  ?> 
  
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> DB APP </title>
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
h3{
    background-color: blue;
    height: 50px;
    width: 200px;
    text-align: center;
    position: relative;
    top: 10px;
    color: white;
    text-decoration: none;
}

body{
    background-image: linear-gradient(to right, beige , blue);
}
</style>

<div class="container-fluid">
    <br/>
  <h1 style= "text-align: center;">XAMUN</h1>
  <div class="row">
    <div class="col-sm-3 col-md-3">
        <br/> <br/> 
      <a href="delegates.php"> <h3> Delegates </h3> </a>
      <br/>
      <a href="dais.php"><h3> Dais </h3></a>
      <br/>
      <a href="orgcom.php"><h3> Org Com </h3></a>
      <br/>
      <a href="pdetails.php"><h3> P Details </h3></a>
       <br/>
   <a href="https://github.com/Prashanti02/DBAPP/wiki"> <h3> HELP </h3> </a>
    </div>

    <div class="col-sm-9 col-md-6" style="background-color:black;">
      <img src="https://thebasilisk.org/wp-content/uploads/2020/03/MUN-Culture-1.jpg" alt="MUN"/>
    </div>
  </div>
</div>
conn$->close();

</body>
</html>

