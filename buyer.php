<?php    
session_start();
$mysqli=new mysqli('remotemysql.com','ijx3LAUDSB','Abt3utIDYR','ijx3LAUDSB');
	if($mysqli->connect_error){

		printf("can not connect databse %s\n",$mysqli->connect_error);
		exit();
	}

	$query="SELECT * FROM property";
	$read=$mysqli->query($query);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <link rel="stylesheet" href="style.css">
    <title>Welcome, <?php echo $_SESSION["fname"]?>!</title>
    <link rel="icon" type="image/x-icon" href="favicons/searching.png">
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

   

    <h2>  Available Properties  </h2>
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
        <?php while ($row=$read->fetch_assoc()) { ?>
        <div class = "propcard">
        <tr>
        <td><img style="height: 250px; width: 350px" src="propimages/<?php echo  $row['img']; ?>"</td>
            <td><?php echo  $row['address'];   ?></td>
            <td><?php echo $row['cost'];   ?></td>
            <td><?php echo  $row['sqfeet'];   ?></td>
            <td><a href="details.php?details=<?php echo  $row['id'];  ?>">Details</a></td>
        </tr>
        </div>

        <?php } ?>
        </tbody>
    </table> 
    

    </div>

    <div id = "searchbox">
        <div class = "searchhead">Search for a property</div>
        <form method="POST" action="searchresults.php">	

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
            <label>Max price</label>
            
            </div>

            <div class="fieldbox">
			<input id="minsqfeet" name="minsqfeet" type="number">
            <label>Min square feet</label>
            
            </div>

            <div class="butt">
			<button class="button">Submit<input type="submit" name="submit" value="" class="shownone"></button>
            </div>

    </div>    




</div>    


    <div class="welcome">
        <div class="welcomepopup">
            <br>
            <br>
            <p>Welcome to Fake Estates <?php echo $_SESSION["fname"].' '.$_SESSION["lname"];?>!</p>
            <p>You can browse properties for sale on this website.</p>
            <p>We hope you can find a place just for you!</p>
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