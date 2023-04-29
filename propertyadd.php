<?php
session_start();
$error = '';
if(isset($_POST['submit'])){
    if(empty($_POST['beds']) || empty($_POST['baths']) || empty($_POST['maxprice']) || empty($_POST['minsqfeet']) || empty($_POST['address'])){
        $error = "Fill out all fields to register";
    }else{

        $email=$_SESSION["email"];
        $beds=$_POST['beds'];
        $baths=$_POST['baths'];
        $price=$_POST['maxprice'];
        $feet=$_POST['minsqfeet'];
        $xtra=$_POST['extra'];
        $desc=$_POST['desc'];
        $address=$_POST['address'];
        $image = $_FILES['image']['name'];
        $target = "propimages/".basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);

        $data1=$_SESSION["fname"];
        $data2=$_SESSION["lname"];
        $owner = $data1 . ' ' . $data2;

        define('DB_SERVER', 'remotemysql.com');
        define('DB_USERNAME', 'ijx3LAUDSB');
        define('DB_PASSWORD', 'Abt3utIDYR');
        define('DB_NAME', 'ijx3LAUDSB');

        $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $query = "INSERT INTO property(cost, address, beds, baths, sqfeet, extras, description, img, email, owner)
        VALUES('$price','$address','$beds','$baths','$feet','$xtra','$desc','$image','$email','$owner')";

        if ($conn->query($query) === TRUE) {
            $error = 'Property Added to listings
            <br><h3><a href="seller.php">Back to your Properties</a></h3>';
            
        }else{
            //$error = 'DATABASE ERROR';
            echo "Error: " . $query . "<br>" . $conn->error;
        }        
        mysqli_close($conn);
    }

}else{
    $error = "Error encountered!";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <link rel="stylesheet" href="style.css">
    <title>Added Listing</title>
    <link rel="icon" type="image/x-icon" href="favicons/add.png">
</head>
<body>
<div id="navbar">
        <h3 id="home">Fake Estate</h3>
        <nav>
        <ul class="links">
            <li><a href="logouthome.php">Logout</a></li>
        </ul>
        </nav>
        <a href="logouthome.php" id="homelink">Home</a>
    </div>

    <h2 style="color: red;"><?php echo $error;?></h2>

    </body>
</html>