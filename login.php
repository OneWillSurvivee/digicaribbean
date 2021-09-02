<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<style type="text/css">
body {
		background-image: url("background.jpg");
  		background-size: cover;
}
	
	#text{

		height: 35px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
		color: black;
		
	}

	.login{  
        width: 382px;  
        overflow: hidden;  
        margin: auto;  
        margin: 20 0 0 450px;  
        padding: 80px;  
        background: white;  
        border-radius: 15px ; 
        margin-top: 130px;
        
    }


	

	  .buttons {
width: 100px;
margin: 0 auto;
display: inline;

}

    .action_btn {
width: 100px;
margin: 0 auto;
display: inline;
}

.header {
	 position: absolute;
	 top: 0;
	 width: 100%;
	 margin: 0;
	  
	 height:90px;
	 left: 0px;
	 margin-left: 0;
	 color: black;
	 background-color: purple;



}



	

	</style>

	<div class="header">
 <h2 style="margin-left: 10px; margin-top: 30px;">Company Name</h2>
  
</div>

	<div id="box">
		<div class="login">
		<form method="post">
			<div style="font-size: 20px;margin-top: -45px; margin: 15; color: black; text-align: center;">Login</div>
			<label for="email">Email</label><br><br>
			<input id="text" type="text" name="user_name"><br><br>
			<label for="password">Password</label><br><br>
			<input id="text" type="password" name="password"><br><br>

			<div class="buttons">
            <div class="action_btn">

            <button name="submit" class="action_btn submit" type="submit" placeholder="enter username here" style=" background-color: white; height: 35px; color: black;" value="Login">Cancel</button>
            <button name="submit"class="action_btn cancel" type="cancel" placeholder="enter username here" style="margin-left: 175px; background-color: #00cccc; height: 35px; color: white; " value="Cancel">Login</button>

			
		</form>
	</div>
</div>

</body>
</html>