<?php

require "../Back-end/functions.php";

if($_SERVER['REQUEST_METHOD'] == "POST")
{

    $voornaam = trim($_POST['voornaam']);
    $voornaam = esc($voornaam);
    $achternaam = trim($_POST['achternaam']);
    $achternaam = esc($achternaam);

    $studentnummer = $_POST['studentnummer'];
    $email = $_POST['email'];
    $mobielenummer = $_POST['mobielenummer'];
    $niveau = $_POST['niveau'];
    $event = $_POST['events'];
    $positie = $_POST['positie'];


    $date = date("Y-m-d H:i:s");

    try {

      $dbservername = "localhost";
      $dbusername = "root";
      $dbpassword = "";
      $dbname = "eventory";

    $conn = new PDO("mysql:host=$dbservername;dbname=$dbname", $dbusername, $dbpassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO `sollicitaties` (voornaam,achternaam,studentnummer,email,mobielenummer,niveau,event,positie) VALUES ('$voornaam','$achternaam','$studentnummer','$email','$mobielenummer','$niveau','$event','$positie')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}
?> 

<html>
<head>
<title>Eventory registratie formulier</title>
<link rel="stylesheet" href="assets/css/styles.css" />
</head>

<body>
  <div class="container">
    <div class="Header">
      <div class="part1">
      <img src="assets/images/hoi.jpg" />
        Creative <br /> College
        </div>
    </div>
    <div class="Main">

<h3>Eventory inschrijf formulier</h3>

<form method="post">

<table align="center" cellpadding = "10">

<!----- First Name ---------------------------------------------------------->
<tr>
<td>Voornaam</td>
<td><input type="text" name="voornaam" maxlength="30"/>
(Maximaal 30 letters)
</td>
</tr>

<!----- Last Name ---------------------------------------------------------->
<tr>
<td>Achternaam</td>
<td><input type="text" name="achternaam" maxlength="30"/>
(Maximaal 30 letters)
</td>
</tr>

<!----- Date Of Birth -------------------------------------------------------->
<tr>
<td>Geboortedatum</td>

<td>
<select name="Birthday_day" id="Birthday_Day">
<option value="-1">Dag:</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>

<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>

<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>

<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>

<option value="31">31</option>
</select>

<select id="Birthday_Month" name="Birthday_Month">
<option value="-1">Maand:</option>
<option value="January">Jan</option>
<option value="February">Feb</option>
<option value="March">Mar</option>
<option value="April">Apr</option>
<option value="May">May</option>
<option value="June">Jun</option>
<option value="July">Jul</option>
<option value="August">Aug</option>
<option value="September">Sep</option>
<option value="October">Oct</option>
<option value="November">Nov</option>
<option value="December">Dec</option>
</select>

<select name="Birthday_Year" id="Birthday_Year">

<option value="-1">Jaar:</option>
<option value="2012">2012</option>
<option value="2011">2011</option>
<option value="2010">2010</option>
<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>

<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>

<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
</select>
</td>
</tr>

<!-- studentnummer -->
<tr>
<td>Studentnummer</td>
<td><input type="text" name="studentnummer" maxlength="6" />
(6 cijfers)
</td>
</tr>

<!----- Email Id ---------------------------------------------------------->
<tr>
<td>Email adres</td>
<td><input type="text" name="email" maxlength="100" /></td>
</tr>

<!----- Mobile Number ---------------------------------------------------------->
<tr>
<td>Mobiele nummer</td>
<td>
<input type="text" name="mobielenummer" maxlength="10" />
(10 cijferig nummer)
</td>
</tr>

<!----- Gender ----------------------------------------------------------->
<tr>
<td>Geslacht</td>
<td>
Man <input type="radio" name="Gender" value="Male" />
Vrouw <input type="radio" name="Gender" value="Female" />
And <input type="radio" name="Gender" value="other" />
</td>
</tr>


<!----- City ---------------------------------------------------------->
<tr>
<td>Provincie</td>
<td><input type="text" name="City" maxlength="30" />
(Maximaal 30 letters)
</td>
</tr>


<!----- State ---------------------------------------------------------->
<tr>
<td>Stad / Dorp</td>
<td><input type="text" name="State" maxlength="30" />
(Maximaal 30 letters)
</td>
</tr>


<!----- Hobbies ---------------------------------------------------------->
<tr>
<td>Wat is je Niveau?</td>
<td>
Niveau 1
<input type="checkbox" name="niveau" value="niveau 1" />
Niveau 2
<input type="checkbox" name="niveau" value="niveau 2" />
Niveau 3
<input type="checkbox" name="niveau" value="niveau 3" />
Niveau 4
<input type="checkbox" name="niveau" value="niveau 4" />
</br>
</td>
</tr>

<tr>
<td>Welke evenement kies je</td>

<td>

<select id="events" name="events">
<option value="-1">Kies jou evenement:</option>
<?php

class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<option> " . parent::current(). "</option>";
  }

}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventory";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT naam FROM events");
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?> 
</select>


</td>
</tr>

<tr>
<td>Evenement locatie</td>

<td>

<select id="Birthday_Month" name="Evenementen">
<option value="-1">Kies jou locatie:</option>
<option value="Concert">Zuid-Holland</option>
<option value="Cabaret">Noord-Holland</option>
<option value="Toneel">Zeeland</option>
<option value="Open Avonden">Groningen</option>
<option value="May">Drenthe</option>
<option value="June">Friesland</option>
<option value="July">Overijssel</option>
<option value="August">Utrecht</option>
<option value="August">Flevoland</option>
<option value="August">Gelderland</option>
<option value="August">Noord-Brabant</option>
<option value="August">Limburg</option>
</select>


</td>
</tr>

<!----- Qualification---------------------------------------------------------->
<tr>
<td>Positie</td>

<td>

<select id="positie" name="positie">
  <option value="-1">Kies jou positie:</option>
  <option value="organisator">Organisator</option>
  <option value="leidinggevende">Leidinggevende</option>
  <option value="medewerker">Medewerker</option>
  <option value="opbouwer">Opbouwer</option>
  <option value="afbreker">Afbreker</option>
  <option value="kassiere">Kassiere</option>
  <option value="beveiliger">Beveiliger</option>
  <option value="marketing">Marketing</option>
  <option value="planner">Planner</option>
  <option value="catering">Catering</option>
</select>


</td>
</tr>


<!----- Submit and Reset ------------------------------------------------->
<tr>
<td colspan="2" align="center">
<input type="submit" value="Insturen" id="submit">

</td>
</tr>
</table>

</form>

<div class="Footer">
  <img src="assets/images/Knipsel.png" />
</div></div></div>
</body>
</html>
