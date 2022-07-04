<?php

	require "../../Back-end/autoload.php";
	$user_data = check_login($connection);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
</head>
<body>

<a href="../../Back-end/users/registrations/signup.php">

	This is the home page
	<br>
    <?=$_SESSION['username']; ?>

    

</body>
</html>