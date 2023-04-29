<?php    
session_start();
$email=$_SESSION["email"];

$mysqli=new mysqli('remotemysql.com','ijx3LAUDSB','Abt3utIDYR','ijx3LAUDSB');
	if($mysqli->connect_error){

		printf("can not connect databse %s\n",$mysqli->connect_error);
		exit();
	}

	$query="SELECT * FROM property";
	$read=$mysqli->query($query);


    $stmt = $mysqli -> prepare( "SELECT * FROM property WHERE email in (?)");
    $stmt -> bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <link rel="stylesheet" href="style.css">
    <title>Welcome, <?php echo $_SESSION["fname"]?>!</title>
    <link rel="icon" type="image/x-icon" href="favicons/deal.png">
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

   

    <h2>  <?php echo $_SESSION["fname"]?>'s Properties  </h2>
    <hr>

    <div class = "contents">
    <div class = "listview">
    <table>
        <thead>
        <tr>
            <th>View</th>    
            <th>Property Address</th>
            <th>Price</th>
            <th>Sq. Feet</th>
            <th>Details</th>
        </tr>
        </thead>
       
        <tbody>
        <?php while ($row=$result->fetch_assoc()) { ?>
        <div class = "propcard">
        <tr>
        <td><img style="height: 250px; width: 350px" src="propimages/<?php echo  $row['img']; ?>"</td>
            <td><?php echo  $row['address'];   ?></td>
            <td><?php echo $row['cost'];   ?></td>
            <td><?php echo  $row['sqfeet'];   ?></td>
            <td><a href="detailsseller.php?detailsseller=<?php echo  $row['id'];  ?>">Details</a></td>
        </tr>
        </div>

        <?php } ?>
        </tbody>
    </table> 
    

    </div>

    <div id = "searchbox">
        <h2 class="dropdownclick" id="dropdown">+</h2>
    <div class="hide">
        <div class = "searchhead"><p style="text-align: center;">Add a Property</p></div>
        
        <form method="POST" action="propertyadd.php" enctype="multipart/form-data">	

            <div class="fieldbox">
            <input id="beds" name="beds" type="number">
            <label># of bedrooms</label>
            </div>
            
            <div class="fieldbox">
			<input id="baths" name="baths" type="number">
            <label># of bathrooms</label>
            
            </div>
            
            <div class="fieldbox">
			<input id="maxprice" name="maxprice" type="number">
            <label>Set Price</label>
            
            </div>

            <div class="fieldbox">
			<input id="minsqfeet" name="minsqfeet" type="number">
            <label>Square Feet</label>
            </div>

            <div class="fieldbox">
			<input id="address" name="address" type="text">
            <label>Address</label>
            </div>

            <div class="fieldbox">
			<input id="desc" name="desc" type="text">
            <label>Description</label>
            </div>

            <div class="fieldbox">
			<input id="extra" name="extra" type="text">
            <label>Extras</label>
            </div>

            <div class="fieldbox">
                <br>
			<input type="file" name="image">
            <label>Upload Image</label>
            </div>

            <div class="butt">
			<button class="button">Submit<input type="submit" name="submit" value="" class="shownone"></button>
            </div>
        </form>
        </div>
        
    </div>    
</div>    

    <script type="text/javascript">
        document.getElementById('dropdown').addEventListener('click',
        function(){
            document.querySelector('.hide').style.display = 'block';
            document.getElementById('dropdown').className = 'animate';
        });
    </script>


    <div class="welcome">
        <div class="welcomepopup">
            <br>
            <br>
            <p>Welcome to Fake Estates <?php echo $_SESSION["fname"].' '.$_SESSION["lname"];?>!</p>
            <p>You can post your properties for sale here.</p>
            <p>We hope we can help connect you to a buyer!</p>
            <br>
            <div class="butt">
	            <img src="fakebutton.PNG" alt="" id="closepop">
            </div>
        </div>
    </div>
    <script type="text/javascript">
        document.getElementById('closepop').addEventListener('click',
        function(){
            document.querySelector('.welcome').style.display = 'none';
        });
    </script>

</body>
</html>