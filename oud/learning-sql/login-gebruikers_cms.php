<?php

	require "../Back-end/autoload.php";

	$Error = "";

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{

		$email = $_POST['email'];
		if(!preg_match("/^[\w\-]+@[\w\-]+.[\w\-]+$/", $email))
		{
			$Error = "please enter a valid email";
		}

		$password = $_POST['password'];

		if(!$Error = "")
		{

			$arr['password'] = $password;
			$arr['email'] = $email;

			$query = "select * from gebruikers_cms where email = :email && password = :password limit 1";			
			$stm = $connection->prepare($query);
			$check = $stm->execute($arr);

			if ($check) {

				$data = $stm->fetchAll(PDO::FETCH_OBJ);
				if(is_array($data) && count($data) > 0)
				{
					$data = $data[0];
					$_SESSION['username'] = $data->username;
					$_SESSION['url_address'] = $data->url_address;
					header("Location: dashboard/index.php");
					die;	
				}
			}
		}

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body style="font-family: verdana">


	<form method="post">
		<div id="error">
			<?php

				if(isset($Error) && $Error != "") 
				{
					echo $Error;
				}

			?>
		</div>
		<div id="title">Login</div>
		email
		<input id="textbox" type="email" name="email" required> <br><br>
		password
		<input id="textbox" type="password" name="password" required><br><br>

		<input type="submit" value="Login"><br><br>
	</form>

</body>
</html>