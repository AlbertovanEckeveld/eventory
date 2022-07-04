<?php

	require "../../autoload.php";

	$Error 		= "";
	$email		= "";
	$username 	= "";

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{

		$email = $_POST['email'];
		if(!preg_match("/^[\w\-]+@[\w\-]+.[\w\-]+$/", $email))
		{
			$Error = "please enter a valid email";
		}

		$date = date("Y-m-d H:i:s");
		$url_address = get_random_string(60);

		$password = esc($_POST['password']);

		$username = trim($_POST['username']);
		$username = esc($username);
		if(!preg_match("/^[a-zA-Z0-9]+$/", $username))
		{
			$Error = "please enter a valid username";
		}

			$arr = false;
			$arr['email'] = $email;

			$query = "select * from gebruikers where email = :email limit 1";			
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

			$arr['url_address'] = $url_address;
			$arr['username'] = $username;
//			$arr['password'] = $password;
			$arr['email'] = $email;
//			$arr['date'] = $date;
//
//			$query = "insert into gebruikers (url_address,username,password,email,date) values (:url_address,:username,:password,:email,:date)";
//			$stm = $connection->prepare($query);
//			$stm->execute($arr);

			$msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';

			print($msg);

			$hash = md5( rand(0,1000) );
			$password = rand(1000,5000);

			$query = "insert into gebruikers (url_address,username,password,email,hash) values (:url_address,:username,:password,:email,:hash)";

			$to      = $email; // Send email to our user
			
			$subject = 'Signup | Verification'; // Give the email a subject 
			$message = '
			
			Thanks for signing up!
			Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
			
			------------------------
			Username: '.$username.'
			Emai:	  '.$email.'
			Password: '.$password.'
			------------------------
			
			Please click this link to activate your account:
			http://www.albertove.nl/verify.php?email='.$email.'&hash='.$hash.'
			
			'; // Our message above including the link
								
			$headers = 'From:noreply@albertove.nl' . "\r\n"; 
			mail($to, $subject, $message, $headers); 

			//header("Location: login.php");
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
		username
		<input id="textbox" type="text" name="username" value="<?=$username?>" required> <br><br>
		email
		<input id="textbox" type="email" name="email" value="<?=$email?>" required> <br><br>
		password
		<input id="textbox" type="password" name="password" required><br><br>

		<input type="submit" value="Signup"><br><br>
	</form>

</body>
</html>