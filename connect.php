<?php 
$dbhost = 'localhost';         
$dbuser = 'root';         
$dbpass = 'root';         
$dbname = 'appdb';         
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);         
if($conn ) {
echo "Connected";
}
else{	
echo"Not Connected";         
};
?>