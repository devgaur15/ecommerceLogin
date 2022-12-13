<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:login.php");
    exit;
}
?>
<?php 
echo "List of products for user ";
echo $_SESSION['username'] ;
echo "<br>";
$connection = mysqli_connect('localhost', 'root'); //connecting with database 
if($connection){                                   //checking if connection is made or not
//    echo "Connection Successful";
}else{
//  echo "No Connection";
     } 
mysqli_select_db($connection, 'melisdata');
$testing=$_SESSION['username'];
$sql = "SELECT * FROM product WHERE username='$testing'";
$result = mysqli_query($connection, $sql);
$num = mysqli_num_rows($result);
if($num>0){
    while($row = mysqli_fetch_assoc($result)){
    // echo var_dump($row);
    echo $row['productname'] . " " . $row['imageurl'] . " " . $row['description'];
    echo "<br>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        a{
            position: absolute;
            right: 25px;
            top: 25px;
        }
    </style>
</head>
<body>
    <a href="homepage.php">Return to Homepage</a>
</body>
</html>