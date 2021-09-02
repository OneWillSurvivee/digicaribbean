<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
</head>
<body>

<style type="text/css">

body {

  background-image: url("background.jpg");
  background-size: cover;


   
}
  table {
  border-collapse: collapse;
  width: 50%;
  border-spacing: 2px;
  border: 1px solid #eee;
  margin-top: 20px;

 
 

}

tr {
	border-bottom: 1.5px solid #00cccc;
}
  

td, th {
  border: 1px solid white;
  padding: 0.5rem;
  text-align: left;
  padding: 11px;
  font-size: 15px;
}

.center {
  	margin-left: auto;
  	margin-right: auto;
  	border-collapse: collapse;
	font-size: 0.9em;
	font-family: sans-serif;
	min-width: 400px;
	box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);


}
.container {
	background-color: white;
	height: 400px;
	width: 700px;
	margin-top: 130px;
	margin-left: auto;
	margin-right: auto;
	opacity: 0.6;
	border: 2px solid #00cccc;
	box-shadow: 0px 0px 20px rgba(0,0,0,0.10),
	     0px 10px 20px rgba(0,0,0,0.05),
	     0px 20px 20px rgba(0,0,0,0.05),
	     0px 30px 20px rgba(0,0,0,0.05);
	}

.header {
	 position: absolute;
	 top: 0;
	 width: 100%;
	 margin: 0;
	  
	 height:100px;
	 left: 0px;
	 margin-left: 0;
	 background-color: purple;
	 color: white;



}

a {
	color: white;
	margin-left: 10px;

}

</style>

<div class="header">
 <h2 style="margin-left: 10px; margin-top: 30px;">Company Name</h2>
  <a href ="logout.php">Logout</a>
</div>




	
		<div class="container">
		<table class="center">
		<tr>
			<th>Fruit ID</th>
			<th>Fruit Name</th>
			<th>Color</th>
			<th>Size</th>
			<th> Is Local?</th>
		</tr>

		<?php
		$con = mysqli_connect("localhost", "root", "", "login_sample_db");
		$sql = "SELECT * FROM fruits";
		$result = $con -> query($sql);

		if ($result -> num_rows > 0) 
		{
			while ($row = $result -> fetch_assoc())
			{
				echo "<tr><td>" . $row["fruit_id"] . "</td><td>" . $row["fruit_name"] . "</td><td>" . $row["color"] . "</td><td>" . $row["size"] . "</td><td>" . $row["local"] . "</td></td>";
			}
		}
		else{
			echo "No Results";
		}

		$con -> close();
		?>
	</table>
	</div>
</body>
</html>