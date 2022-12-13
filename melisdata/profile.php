<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/47c7df8081.js" crossorigin="anonymous"></script>


    <style>
        body{ font: 14px sans-serif; background-color: #98FB98; }
        img{
            width: 250px; height: 50px; margin: 10px 10px 10px 10px;
        }
        .header{
            font: 18px sans-serif;
            width: 100%; 
            height: 150px;
            margin: 0px;
            padding: 0px;
            position: sticky;
        }
        .header ul{
            display: flex;
            float: right;
            margin: 5px;
            padding: 5px;
        } 
        .header li{
            margin: 5px;
            padding: 5px;
            line-height: 30px;
        }
        .footer{
            position: fixed;
        }
    </style>
</head>
     <body>
     <div class="header">
    <a href="homepage.php"><img src="data:image/png;base64,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" alt="Logo"></a>
</div>
    
    <!-- php code for form -->
    <?php 

 $connection = mysqli_connect('localhost', 'root'); //connecting with database 
 if($connection){                                   //checking if connection is made or not
//    echo "Connection Successful";
 } else{
    //  echo "No Connection";
 } 
 mysqli_select_db($connection, 'melisdata');
// variables
$firstname=$lastname=$address=$city=$state="";
$testing=$_SESSION['username'];
//  echo $testing;
$sql = "SELECT * FROM signup WHERE username='$testing'";
//  $sql="SELECT * FROM signup";
 $queryAllData=mysqli_query($connection,$sql);
 $data=mysqli_fetch_array($queryAllData);
 
 $userid=$data['id'];
 
if(isset($_POST['submit']))
{

// validation

// first name
if(empty($_POST['firstname'])){
    $fnameerror="name not filled";
    
}else{

    $firstname = $_POST['firstname'];
}
//last name
if(empty($_POST['lastname'])){
    $lnameerror="name not filled";
    
}else{

    $lastname = $_POST['lastname'];
}
//address
if(empty($_POST['address'])){
    $adderror="address not filled";
    
}else{

    $address = $_POST['address'];
}
//city
if(empty($_POST['city'])){
    $cityerror="city not filled";
    
}else{

    $city = $_POST['city'];
}
//state
if(empty($_POST['state'])){
    $stateerror="state not filled";
    
}else{

    $state = $_POST['state'];
}

if(empty($fnameerror) || empty($lnameerror) || empty($adderror) || empty($cityerror) || empty($stateerror)){
    //    echo "hello";
       $query = "UPDATE signup SET firstname = '$firstname', lastname = '$lastname', address = '$address', city = '$city', state = '$state' WHERE id = '$userid' ";

    //running these queries
    mysqli_query($connection, $query);
} else{
    echo "<script> alert('Fill All required (MARKED) fields');</script>";

}}
 
?>
<!-- php end -->

    <form action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="firstname">First Name*</label>
      <input type="text" class="form-control" name="firstname" placeholder="First Name" >
    </div>
    <div class="form-group col-md-6">
      <label for="lastname">Last Name*</label>
      <input type="text" class="form-control" name="lastname" placeholder="Last Name">
    </div>
  </div>
  <div class="form-group">
    <label for="address">Address*</label>
    <input type="text" class="form-control" name="address" placeholder="Address">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="city">City*</label>
      <input type="text" class="form-control" name="city" placeholder="City">
    </div>
    <div class="form-group col-md-6">
      <label for="state">State*</label>
      <input type="text" class="form-control" name="state" placeholder="State">
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Save</button>
</form>
    

    
    <footer class="footer">
        <div class="inner-footer">
            <div class="social-links">
                <ul>
                    <li class="social-items"><a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a></li>
                    <li class="social-items"><a href="https://twitter.com/"><i class="fa-brands fa-twitter"></i></a></li>
                    <li class="social-items"><a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a></li>
                </ul>
            </div>
            <div class="quick-links">
                <ul>
                    <li class="quick-items"><a href="signup.php">Sign Up</a></li>
                    <li class="quick-items"><a href="login.php">Login</a></li>
                    <li class="quick-items"><a href="https://www.melisxpress.in/index.php">About Us</a></li>
                </ul>
            </div>
        </div>
        <div class="outer-footer">
            Copyright &copy; Melisxpress Pvt Ltd. 
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>