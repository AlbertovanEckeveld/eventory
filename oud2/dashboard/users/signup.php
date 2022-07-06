<?php

	require "../../Back-end/autoload.php";

	$Error 		= "";
	$email		= "";
	$fullname 	= "";

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{

		$email = $_POST['email'];
		if(!preg_match("/^[\w\-]+@[\w\-]+.[\w\-]+$/", $email))
		{
			$Error = "please enter a valid email";
		}

		$date = date("Y-m-d H:i:s");

		$password = esc($_POST['password']);

		$fullname = trim($_POST['fullname']);
		$fullname = esc($fullname);
		if(!preg_match("/^[a-zA-Z0-9]+$/", $fullname))
		{
			$Error = "please enter a valid username";
		}

			$arr = false;
			$arr['email'] = $email;

			$query = "select * from `gebruikers_cms` where email = :email limit 1";			
			$stm = $connection->prepare($query);
			$check = $stm->execute($arr);

			if($check) {

				$data = $stm->fetchAll(PDO::FETCH_OBJ);
				if(is_array($data) && count($data) > 0)
				{
					echo "That email is already used";
				}
			}

		if(!$Error = "")
		{

			$arr['fullname'] = $fullname;
			$arr['password'] = $password;
			$arr['email'] = $email;
			$arr['date'] = $date;

			$query = "insert into `gebruikers_cms` (fullname,email,password,date) values (:fullname,:email,:password,:date)";
			$stm = $connection->prepare($query);
			$stm->execute($arr);

			header("Location: gebruikers.php");
			die;
		}

	}



?>

<!DOCTYPE html>
<html>
<head>
	<title>signup</title>
</head>
<body style="font-family: verdana">
<html>

<head>
  <title>Eventory registratie formulier</title>
  <link rel="stylesheet" href="../assets/css/styles-dashboard.css" />
</head>

<body>
  <div class="container">
    <div class="Header">
      <div class="part1">
        <img src="../assets/img/hoi.jpg" />
      </div>
    </div>

    <div class="Sidebar">
         <div class="navbar">
           <a href="../dashboard.php">Home</a> 
           <a href="gebruikers.php">Users</a>
           <a href="../events/events.php">Events</a>
           <a href="../inschrijvingen/inschrijvingen.php">Inschrijvingen</a>

         </div></div>
<div class="Main">
	<form method="post">
		<div id="error">
			<?php

				if(isset($Error) && $Error != "") 
				{
					echo $Error;
				}

			?>
		</div>
		<div id="title">Signup</div>
		fullname
		<input id="textbox" type="text" name="fullname" value="<?=$fullname?>" required> <br><br>
		email
		<input id="textbox" type="email" name="email" value="<?=$email?>" required> <br><br>
		password
		<input id="textbox" type="password" name="password" required><br><br>

		<input type="submit" value="Signup"><br><br>
	</form>
			</div>
	<div class="footer">
        <img src="../assets/img/Knipsel.png" />
      </div>

</body>
</html>