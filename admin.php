<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <link rel="stylesheet" href="style.css">
    <title>Admin Analysis</title>
    <link rel="icon" type="image/x-icon" href="favicons/settings.png">
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

    <?php
    $mysqli=new mysqli('remotemysql.com','ijx3LAUDSB','Abt3utIDYR','ijx3LAUDSB');

    $sql = "SELECT * FROM userdata";
    $result = $mysqli->query($sql);
    $registeredusers = 0;
    $buyerusers = 0;
    $sellerusers = 0;

    echo "<h2>Registered Users Data</h2>";
    if ($result->num_rows > 0) {
	echo "<table><tr><th>Username</th><th>Password</th><th>User Type</th><th>Email</th><th>First Name</th><th>Last Name</th></tr>";

	while($rows=$result->fetch_assoc()){

		echo "<tr><td>".$rows["username"]."</td><td>".$rows["password"]."</td><td>".$rows["usertype"]."</td><td>".$rows["email"]."</td>
        <td>".$rows["firstname"]."</td><td>".$rows["lastname"]."</td></tr>";
        $registeredusers++;

        if($rows["usertype"]=="buyer"){

            $buyerusers++;

        }elseif($rows["usertype"]=="seller"){
            $sellerusers++;
        }

	}
	 echo "</table>";
    }

    echo "<br><br><br>";


    //$query = "INSERT INTO property(cost, address, beds, baths, sqfeet, extras, description, img, email)
    //VALUES('$price','$address','$beds','$baths','$feet','$xtra','$desc','$image','$email')";
    //$sql1 = " CREATE VIEW combined AS SELECT 'property.cost', 'property.address', 'property.beds',
   // 'property.baths', 'property.sqfeet', 'property.extras', 'property.description', 'property.img', 'property.email', 'userdata.firstname', 'userdata.lastname'
   // FROM property JOIN userdata ON 'property.email'='userdata.email'";
   // $sql2= "SELECT * FROM combined";


    
    $sql = "SELECT * FROM property";
    
    $result = $mysqli->query($sql);
    $properties = 0;
    echo "<h2>Properties Stored</h2>";
    if ($result->num_rows > 0) {
	echo "<table><tr><th>Cost</th><th>Address</th><th>Beds</th><th>Baths</th><th>SQ Feet</th><th>Extras</th><th>Description</th>
    <th>Email</th><th>Property Owner</th></tr>";

	while($rows=$result->fetch_assoc()){

		echo "<tr><td>".$rows["cost"]."</td><td>".$rows["address"]."</td><td>".$rows["beds"]."</td><td>".$rows["baths"]."</td>
        <td>".$rows["sqfeet"]."</td><td>".$rows["extras"]."</td><td>".$rows["description"]."</td><td>".$rows["email"]."</td>
        <td>".$rows["owner"]."</td></tr>";

        $properties++;
	}
	 echo "</table>";
    }

    $registeredusers=$registeredusers-1;


    ?>

    

        <h2>Other Data</h2>
<div class="listofcards"> 
        <div class="card">
            <div class="diff">
                <h4>Total Users</h4>
                <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;<?php echo $registeredusers?></h4>
            </div>
        </div>

        <div class="card">
            <div class="diff">
            <h4>Total Properties</h4>
                <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;<?php echo $properties?></h4>
            </div>
        </div>

        <div class="card">
            <div class="diff">
            <h4>Total Buyers</h4>
                <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;<?php echo $buyerusers?></h4>
            </div>
        </div>

        <div class="card">
            <div class="diff">
            <h4>Total Sellers</h4>
                <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;<?php echo $sellerusers?></h4>
            </div>
        </div>

</div>

    
</body>
</html>