<?php

$mysqli=new mysqli('remotemysql.com','ijx3LAUDSB','Abt3utIDYR','ijx3LAUDSB');
	if($mysqli->connect_error){

		printf("can not connect databse %s\n",$mysqli->connect_error);
		exit();
	}

$error = '';
$sql = "DELETE FROM property WHERE id='".$_GET['id']."' ";

if ($mysqli->query($sql) === TRUE) {

    $error ='Successfully Deleted Property Listing!
            <br><h3><a href="seller.php">Back to your Properties</a></h3>';

}else{

    $error = "A problem has occured in the deleting process!";

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <link rel="stylesheet" href="style.css">
    <title>Remove Listing</title>
    <link rel="icon" type="image/x-icon" href="favicons/bin.png">
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