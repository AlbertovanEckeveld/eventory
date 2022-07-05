<?php
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "eventory";


function get_random_string($length)
{

	$array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
	$text = "";

	$length = rand(4,$length);

	for ($i=0; $i <$length; $i++) 
	{ 
		$random = rand(0,61);

		$text .= $array[$random];
	}

	return $text;

}


function esc($word)
{
	return addslashes($word);
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{

    $fullname = trim($_POST['fullname']);
    $fullname = esc($fullname);
    $date = date("Y-m-d H:i:s");
    $email = $_POST['email'];


    $arr['fullname'] = $fullname;
    $arr['email'] = $email;
    $arr['date'] = $date;



    try {

        $arr['fullname'] = $fullname;
        $arr['email'] = $email;
        $arr['date'] = $date;

    $conn = new PDO("mysql:host=$dbservername;dbname=$dbname", $dbusername, $dbpassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO `gebruikers_cms` (fullname,email,date) 
    VALUES ('$fullname', '$email', '$date')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}
?> 
<form method="post">
<tr>
<td>fullname</td>
<td><input type="text" name="fullname" maxlength="30"/>
(Maximaal 30 letters)
</td>
</tr>

<tr>
<td>email</td>
<td><input type="text" name="email" maxlength="30"/>
(Maximaal 30 letters)
</td>
</tr>

<tr>
<td>password</td>
<td><input type="text" name="password" maxlength="30"/>
(Maximaal 30 letters)
</td>
</tr>

<input type="submit" value="Signup"><br><br>

</form>