<?php

	require "../../Back-end/autoload.php";

	$Error 	= "";
	$naam 	= "";
    $locatie = "";

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{

		$naam = trim($_POST['naam']);
		$naam = esc($naam);

        $datum = $_POST['datum'];
        $locatie = $_POST['locatie'];

		if(!$Error = "")
		{

			$arr['naam'] = $naam;
			$arr['locatie'] = $locatie;
			$arr['datum'] = $datum;

			$query = "insert into `events` (naam,datum,locatie) values (:naam,:datum,:locatie)";
			$stm = $connection->prepare($query);
			$stm->execute($arr);

			header("Location: events.php");
			die;
		}

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Nieuw event maken | Eventory</title>
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
		<div id="title">Maak een nieuw event</div>
		Naam event
		<input id="textbox" type="text" name="naam" value="<?=$naam?>" required> <br><br>
		Locatie
		<input id="textbox" type="datum" name="locatie" value="<?=$locatie?>" required> <br><br>
		Datum
		<input id="datetime-local" type="datetime-local" name="datum"><br><br>

		<input type="submit" value="Signup"><br><br>
	</form>
			</div>
	<div class="footer">
        <img src="../assets/img/Knipsel.png" />
      </div>

</body>
</html>