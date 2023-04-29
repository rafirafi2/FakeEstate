<?php

$mysqli=new mysqli('remotemysql.com','ijx3LAUDSB','Abt3utIDYR','ijx3LAUDSB');
	if($mysqli->connect_error){

		printf("can not connect databse %s\n",$mysqli->connect_error);
		exit();
	}

if(isset($_GET['details'])){

	$id=$_GET['details'];
	$query2= "SELECT * FROM property where id='$id'";
	$readd=$mysqli->query($query2);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <link rel="stylesheet" href="style.css">
    <title>Details</title>
    <link rel="icon" type="image/x-icon" href="favicons/details.png">
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



<div class="container">
	<table>
  <thead>
    <tr>
      <th>Address</th>
      <th>Price</th>
      <th>Beds</th>
      <th>Baths</th>
      <th>Description</th>
      <th>Extra feature</th>
      <th>Owner</th>
      
    </tr>
  </thead>
  <tbody>
  <?php while ($row= $readd->fetch_assoc()) { ?>
    <img style="height: 350px; width: 450px; padding: 30px; margins: auto;" src="propimages/<?php echo  $row['img']; ?>"
    <tr>
      <td> <?php echo $row['address'];  ?></td>
      <td> <?php echo $row['cost'];  ?></td>
      <td> <?php echo $row['beds'] . " bedrooms";  ?></td>
      <td><?php echo $row['baths']. " bathrooms";  ?></td>
       <td><?php echo $row['description'];  ?></td>
       <td><?php echo $row['extras'];  ?></td>
       <td><?php echo $row['owner'];  ?></td>
      
    </tr>
<?php   } ?>
  </tbody>
</table> 

</div>

<br><h3><a href="buyer.php">Back to Property Listings</a></h3>

</body>
</html>